<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
    //前台登录判断
    public function index()
    {
        $user = M('user');
        $uname = I('post.');
        $arr['pname'] = $uname['name'];
//        file_put_contents('txt.txt',$uname['password']);
//        $map['id'] = array('gt',0);
        $info = $user->where($arr)->find();
//        $info = $user->where("pname='$uname'")->find();
//        dump($info);exit;
//        file_put_contents('text1.txt',$info['password']."\r\n",FILE_APPEND);
//        file_put_contents('text1.txt',md5($uname['password'])."\r\n",FILE_APPEND);

        if ($info) {
            $redis = new \Redis();
            $redis->connect('127.0.0.1',6379);
            $username = $uname['name'];
            //通过username查询次数
            $times = $redis->get($username);
            //判断是否超过次数
            if($times === false || $times < 3){
                if(empty($uname['password'])){
                     $arr = array(0, '密码不能为空');
                }else{
                    if ($info['password'] == md5($uname['password'])) {

                    $_SESSION['name'] = $info;
                    $arr = array(1, $arr['pname']);


                    } else {
                        //以用户名作为key
                        $redis->incr($username);
                        //设置key的有效时间 控制登录限制时间
                        $redis->setTimeout($username,10);
                        $rest = 2-$times;
                        $arr = array(0, '密码不正确,还可输入'.$rest.'次');

                    }
                }
                
            }else{
                $arr = array(2, '超过指定次数');
            }


        } else {
            $arr = array(0, '账号不存在');

        }

        echo json_encode($arr);

    }
    //显示登录页面
    public function login2(){
        $this->display('Index/login2');
    }

    //显示前台注册页面  注册处理
    public function register()
    {
        if (IS_POST) {
            $yzm = I('post.yzm');
            $arr['pname'] = I('post.pname');
            $user = M('User')->where($arr)->select();
            if (!$user) {                                       //验证用户名是否已存在
                $verify = new \Think\Verify();
                if ($verify->check($yzm)) {                     //验证码验证
                    $user = D('User');
                    if ($user->create()) {                      //自动验证
                        $model = new \Think\Model();
                        $model->startTrans();                   //注册的时候 同时生成用户的个人资金表   用事务处理
                        $id = $user->add();
                        $arr1['user_id']=$id;
                        $id2=M('Property')->add($arr1);
                        if($id && $id2){
                            $model->commit();                  //两个动作都完成则提交事务  否则回滚
                            $arr = array(1, '添加成功');
                        }else{
                            $model->rollback();
                            $arr = array(0, '添加失败');
                        }

                    } else {
                        $arr = array(0, $user->getError());
                    }
                } else {
                    $arr = array(0, '验证码错误');
                }
            }else{
                $arr = array(0, '用户名已存在');
            }
            $this->ajaxReturn($arr);

        } else {
            $this->display('Index/register');
        }
    }
    //验证码
    public function verify()
    {
        $config = array(
            'fontSize' => 60,                                  // 验证码字体大小
            'length' => 4,                                     // 验证码位数
            'fontttf' => '2.ttf'                               //验证码字体
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
}


?>