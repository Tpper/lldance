<?php
namespace Admin\Controller;
use Think\Controller;	

/**
 * 后给给用户发信件
 */

class EmailUserController extends Controller{
	//给用户发送信件模板
    public function add_User(){
        $this->assign('user',M('user')->select());
        $this->display();
    }
    //处理信件提交
    public function addHandle_User(){
    	$email = D('emailUser');
    	$id = I('post.receive_id');
    	
    	//判断是否选择全体用户
        if($id == 'true' ){
            $arr = M('user')->field('id')->select();
        	foreach ($arr as $key => $value) {
        	
        	if($email->create()){
            	//验证是否有附件 有则组合路径和文件名
             	if($_FILES['file']['name']){
                	$info = $this->upload();
                	$email->filepath = $info['file']['savepath'].$info['file']['savename'];
               		$email->truefilename = $info['file']['name'];
            	}
            	//dump($value['id']);
            	$email->receive_id = $value['id'];
            	$email->add();

        	}else{
        		$this->error($email->getError());
	        }
         }
         $this->success('发送成功',U('EmailUser/add_User'));
        }else{
        	if($email->create()){
                //验证是否有附件 有则组合路径和文件名
                if($_FILES['file']['name']){
                    $info = $this->upload();
                    $email->filepath = $info['file']['savepath'].$info['file']['savename'];
                    $email->truefilename = $info['file']['name'];
            }
        		if($email->add()){
        			$this->success('添加成功',U('EmailUser/add_User'));
        		}else{
        			$this->error('添加失败');
        		}
        	}else{
        		$this->error($email->getError());
        	}
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
        $info = M('email_user')->field('filepath,truefilename')->find($id);
        $file = './Public/Uploads/'.$info['filepath'];
        //$file = "D:/Uploads/photo.jpg";  //下载文件的地址，包括文件名
        header("Content-type: application/octet-stream");  //告诉浏览器要以流的形式返回
        header('Content-Disposition: attachment; filename="' .  $info['truefilename'] . '"'); //提示给用户此次下载的文件的名字是什么
        header("Content-Length: ". filesize($file)); //提示给浏览器，此次下载的文件大小是多少
        readfile($file);  //读取文件到输出缓存，下载

    }

    //显示发件箱模板
    public function send_User(){
        //查询总记录数
         $count = M('email_user')->where(array('send_id'=>session('name.id')))->count();
        //实例化分页类
        $Page = new \Think\Page($count,5);
        $Page->rollPage=3;
        $Page->lastSuffix = false;
        $data = M('email_user')->field('email_user.*,user.pname')->join('join user on email_user.receive_id=user.id')->order('addtime desc')->where(array('send_id'=>session('name.id')))->limit($Page->firstRow, $Page->listRows)->select();
        //dump($data);
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

    //删除
    public function del(){
        $id = I('get.id');
        $email = M('email');
        $a = $email->where(array('id'=>$id))->find();
        $arr = explode('/',$a['filepath']);
        $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
        $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$arr[0]";
        unlink($url);
        rmdir($url1);
        M('email_user')->delete($id);
    }
    //删除发件箱所有内容
    public function delAllSend(){
         $data = M('email_user')->field('id')->where(array('send_id'=>session('name.id')))->select();
        $arr = '';
        foreach ($data as $value) {
            foreach ($value as $v) {
               $arr[]= $v;
            }
        }
        foreach ($arr as $key => $value) {
            $a= M('email_user')->where(array('id'=>$value))->find();
            $array = explode('/',$a['filepath']);
            $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
            $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$array[0]";
            unlink($url);
            rmdir($url1);
        }
        $email = M('email_user');
        $email->where(array('send_id'=>session('name.id')))->delete();

    }
     //批量删除并删除图片文件
    public function delCheck(){
        $id = I('post.check');
        if(!$id){
            $this->error('请选择要删除的信件');
        }
        //dump($id);die;
        foreach ($id as $key => $value) {
            $a = M('email_user')->where(array('id'=>$value))->find();
            $arr = explode('/',$a['filepath']);
            $url = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$a[filepath]";
            $url1 = $_SERVER["DOCUMENT_ROOT"]."/Public/Uploads/$arr[0]";
            unlink($url);
            rmdir($url1);
        }
        $idstr = implode(',', $id);//分割数组成字符串
        if(M('email_user')->delete($idstr)){
             $this->success('删除成功',U('send_User'));
             //$this->redirect(U('receive'),'123','1');
        }
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

    //查询发件箱最新内容
    public function checkSend(){
        $email = M('email_user');
        $send = $email->field('email_user.id')->order('addtime desc')->where(array('send_id'=>session('name.id')))->find();
        $this->ajaxReturn($send,'json');
    }



}





?>
