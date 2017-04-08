<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    //显示用户和列表分页
    public function user(){
        $dept =M('User');
        //实例化分页类
        $count =$dept->count();//总记录数
        $Page = new\Think\Page($count,3);
        $data = $dept->limit($Page->firstRow, $Page->listRows)->select();
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 个会员</span>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();
        $this->assign('data',$data);
        $this->assign('show', $show);
        $this->display('user');
    }

    //完成用户添加方法
    public function add(){
        if(IS_POST){
            $user = D('User'); //使用D方法才是实例化自定义的UserModel，M方法实例化的是Model
            if($user->create()){
                if($id = $user->add()){
                    $this->redirect('User/user');
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($user->getError()); //getError方法可以获取到是因为什么，数据创建失败
            }
        }else{
            $this->assign('dept', M('User')->select());
            $this->display();
        }
    }

    //完成用户修改页面
    public function edit(){
        $id = $_GET[id];
        $row =M('User')->find($id);//实例化对象，取出一条记录
        $this->assign('row',$row);
        $this->display();
    }
    //完成用户修改的方法
    public function editHandle()
    {
//        dump($_POST);die;
        if (false !== M('User')->save($_POST)) {
            $this->redirect('User/user');
        } else {
            $this->error('修改失败');
        }
    }
    //删除用户
    public function delete(){
        $id =I('get.id');
//        var_dump($id);die;
        if(M('User')->delete($id)){
            $this->redirect('User/user');
        }else{
            $this->error('删除失败');
        }
    }

    //批量删除
    public function deletes(){
        $arr =$_POST['sf'];
        $obj = M('User');
        for($i=0;$i<count($arr);$i++){
            $r= $obj->delete($arr["$i"]);
            if($r){//删除成功
                $this->redirect('User/user');
            }else{//删除失败
                $this->error('删除失败');
            }
        }
    }
}