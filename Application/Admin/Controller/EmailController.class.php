<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 站内信件
 */

class EmailController extends Controller{

    //给管理员写信界面
    public function add(){
        $this->assign('admin',M('admin')->select())->display();

    }

    //给管理员写信处理
    public function addHandle(){
        $email = D('email');
        if($email->create()){
            //验证是否有附件 有则组合路径和文件名
            // dump(I('post.'));die;
            if($_FILES['file']['name']){
                $info = $this->upload();
                $email->filepath = $info['file']['savepath'].$info['file']['savename'];
                $email->truefilename = $info['file']['name'];
            }
            if($email->add()){
                $this->success('添加成功',U('Email/add'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->error($email->getError());
        }
    }
    //上传附件方法
    public function upload(){
        $up = new \Think\Upload();
        $up->rootPath = './Public/Uploads/';
        $up->maxSize = 102485760;
        if($info = $up->upload()){
            return $info;
        }else{
            $this->error($up->getError());
        }
    }

    //下载方法
    public function download(){
        $id = I('get.id');
        $info = M('email')->field('filepath,truefilename')->find($id);
        $file = './Public/Uploads/'.$info['filepath'];
        //$file = "D:/Uploads/photo.jpg";  //下载文件的地址，包括文件名
        header("Content-type: application/octet-stream");  //告诉浏览器要以流的形式返回
        header('Content-Disposition: attachment; filename="' .  $info['truefilename'] . '"'); //提示给用户此次下载的文件的名字是什么
        header("Content-Length: ". filesize($file)); //提示给浏览器，此次下载的文件大小是多少
        readfile($file);  //读取文件到输出缓存，下载

    }
    //给管理员显示收件箱模板
    public function receive(){
       //查询总记录数
        $count = M('email')->where(array('receive_id'=>session('name.id')))->count();
        //dump($count);
        //实例化分页类
        $Page = new \Think\Page($count, 5);
        $Page->rollPage=3;
        $Page->lastSuffix = false;
        $data = M('email')->field('email.*,admin.username')->join('join admin on email.send_id=admin.id')->order('addtime desc')->where(array('receive_id'=>session('name.id')))->limit($Page->firstRow, $Page->listRows)->select();
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ');
        $show = $Page->show();
        $this->assign('show', $show);
        $p = $Page->firstRow;
        $this->p = $Page->firstRow;
        //ajax查询新邮件
       
        
        //dump($data);

        //$this->assign('data',$data);
        $this->data = $data;
        $this->display();
        // $this->ajaxReturn($data,'json');

    }

    //显示给管理员发件箱模板
        
    public function send(){
        //查询总记录数
        $count = M('email')->where(array('send_id'=>session('name.id')))->count();
        //实例化分页类
        $Page = new \Think\Page($count, 5);
        $Page->rollPage=3;
        $Page->lastSuffix = false;

        $email = M('email');
        $data = $email->field('email.*,admin.username')->join('join admin on email.receive_id=admin.id')->order('addtime desc')->where(array('send_id'=>session('name.id')))->limit($Page->firstRow, $Page->listRows)->select();
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ');
        $show = $Page->show();
        $this->assign('show', $show);
        $p = $Page->firstRow;
        $this->p = $Page->firstRow;
        //dump($data);
        // dump($data);die;
        $this->assign('data', $data);
        $this->display();
    }

    //获取一个收件箱的内容并更新为已读
    public function getReceiveById(){
        $id = I('get.id');
        //更新is_read字段
        M('email')->save(array('id'=>$id,'is_read'=>1));

        //获取一封邮件内容
        $row = M('email')->find($id);
        $this->row = $row;
        $this->display();
    }

    //获取一个收件箱的内容
    public function getSendById(){
        $id = I('get.id');
        //更新is_read字段
       

        //获取一封邮件内容
        $row = M('email')->find($id);
        $this->row = $row;
        $this->display('getReceiveById');
    }

    //检查是否有未读邮件
    public function checkMsg(){
        //条件 is_read=0  receive_id =session('uname.id')
        $count = M('Email')->where(array('is_read'=>0,'receive_id'=>session('name.id')))->count();
        $this->ajaxReturn($count,'json');
    }

    //删除邮件并删除图片文件
    public function del(){
        $id = I('get.id');
        $email = M('email');
        $a = $email->where(array('id'=>$id))->find();
        $arr = explode('/',$a['filepath']);
        $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
        $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$arr[0]";
        unlink($url);
        rmdir($url1);
        //unlink($url1);
        $email->delete($id);

    } 
    //删除收件箱所有内容并删除图片文件
    public function delAllReceive(){
        $data = M('email')->field('id')->where(array('receive_id'=>session('name.id')))->select();
        $arr = '';
        foreach ($data as $value) {
            foreach ($value as $v) {
               $arr[]= $v;
            }
        }
        foreach ($arr as $key => $value) {
            $a= M('email')->where(array('id'=>$value))->find();
            $array = explode('/',$a['filepath']);
            $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
            $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$array[0]";
            unlink($url);
            rmdir($url1);
        }
        M('email')->where(array('receive_id'=>session('name.id')))->delete();
    
    }

    //批量删除并删除图片文件
    public function delCheck(){
        $id = I('post.check');
        if(!$id){
            $this->error('请选择要删除的信件');
        }

        foreach ($id as $key => $value) {
            $a = M('email')->where(array('id'=>$value))->find();
            $arr = explode('/',$a['filepath']);
            $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
            $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$arr[0]";
            unlink($url);
            rmdir($url1);
        }
        $idstr = implode(',', $id);//分割数组成字符串
        if(M('email')->delete($idstr)){
             $this->success('删除成功',U('receive'));
             //$this->redirect(U('receive'),'123','1');
        }

    }
    //删除发件箱所有内容
    public function delAllSend(){
        $data = M('email')->field('id')->where(array('send_id'=>session('name.id')))->select();
        $arr = '';
        foreach ($data as $value) {
            foreach ($value as $v) {
               $arr[]= $v;
            }
        }
        foreach ($arr as $key => $value) {
            $a= M('email')->where(array('id'=>$value))->find();
            $array = explode('/',$a['filepath']);
            $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
            $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$array[0]";
            unlink($url);
            rmdir($url1);
        }
        M('email')->where(array('send_id'=>session('name.id')))->delete();
    }


    //查询收件箱是否有新内容
    public function checkReceive(){
        $email = M('email');
        $receive = $email->field('email.*')->order('addtime desc')->where(array('receive_id'=>session('name.id')))->find();
        $this->ajaxReturn($receive,'json');
    }
    //查询发件箱新内容
    public function checkSend(){
        $email = M('email');
        $send = $email->field('email.*')->order('addtime desc')->where(array('send_id'=>session('name.id')))->find();
        $this->ajaxReturn($send,'json');
    }

    /*//发件箱查看阅读状态
    public function checkRead(){
        $email = M('email');
        $read = $email->field('is_read')->where(array('send_id'=>session('name.id')))->select();
        $this->ajaxReturn($read,'json');
    }*/
}
?>