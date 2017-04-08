<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function login()
    {
        $user = D('Admin');
        $uname = I('post.');
//        dump($uname);exit;
        $arr['name'] = $uname['name'];
        $info = $user->where($arr)->find();
        if ($info) {
            if($info['password']==md5($uname['password'])){

//                    $log = new LoginModel();
//                    $log->checkLog($uname['name']);      //改变登录状态
                $_SESSION['name']=$info;

                $arr = array(1,"登录成功");

            }else{
                $arr = array(0,"密码错误");
            }

        }else{
            $arr = array(0,"账号不存在");
        }
        $this->ajaxReturn($arr);
    }
    //退出操作
    public function logout(){
        unset($_SESSION['name']);
        $this->redirect('Login/index');
    }

}