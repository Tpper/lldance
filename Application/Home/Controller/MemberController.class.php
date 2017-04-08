<?php
namespace Home\Controller;

use Home\Model\PersonalInvestModel;
use Think\Controller;

class MemberController extends Controller
{
    //显示个人中心模板
    public function member()
    {
        $money = D('Property')->mon(session('name.id'));         //实例化property模型类并调用其方法
        $this->assign('money', $money);
        $this->display('member');
    }

    //显示资产统计
    public function asset()
    {
        $per = D('PersonalInvest');
        $money = D('Property')->mon(session('name.id'));         //实例化property模型类并调用其方法
        $invest = $per->invest(session('name.id'));
        $gains = $per->gains(session('name.id'));
//        dump($gains);exit;
        $this->assign('money', $money);                          //将用户的账户余额分配到模板
        $this->assign('invest', $invest);                        //将取出的投资总额分配到模板
        $this->assign('gains', $gains);
        $this->display('Asset-Statistics');
    }

    //显示充值页面
    public function recharge()
    {
        $this->display('recharge');
    }

    //显示我要提现页面
    public function withdrawals()
    {
        $this->display('Withdrawals');
    }

    //显示银行卡管理
    public function bank()
    {
        $this->display('Bank-Card');
    }

    //显示交易记录
    public function record()
    {
        $this->display('Record');
    }

    //显示我的投资页面
    public function my()
    {
        $this->display('My-investment');
    }

    //显示我的借款
    public function loan()
    {
        $loan = M('borrow');
        $uid = $_SESSION['name']['id'];
        $data = $loan->where('user_id='.$uid)->find();
        $amount = ($data['amount']/100*0.005);
        /*dump($amount);die();*/
       /* dump($data);die;*/
        /* $is_read = $data['is_read'];*/
        //dump($is_read);die();
        // dump($is_read);die;
       /* $arr = array(0=>'正在审批',1=>'已审批',2=>array('已通过','已拒绝'));
       if($is_read==0){
            $arr= explode(' ',array_shift($arr));
        }elseif ($is_read==1){
            array_pop($arr);
        }elseif($is_read==2){
            $arr[2] = '已通过';
        }else{
            $arr[2] = '已拒绝';
        }*/
        // dump($arr);die;
        //dump($uid);
        //$borrow = $loan->query("select count(*) from borrow WHERE user_id = $uid");
        $borrow = $loan->where('user_id='.$uid)->count('id');
        $this->assign('borrow',$borrow);
        $this->assign('data',$data);
        $this->assign('amount',$amount);
        //dump($data);
        $this->display('loan');
    }

    //显示站内信息
    public function infomation(){
        $email = M('email_user');
         //查询总记录数
        $count = $email->where(array('receive_id'=>session('name.id')))->count();
        //dump($count);
        //实例化分页类
        $Page = new \Think\Page($count, 5);
        $Page->rollPage=3;
        $Page->lastSuffix = false;
        $data = $email->where(array('receive_id'=>session('name.id')))->limit($Page->firstRow, $Page->listRows)->select();
        // dump($data);
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ');
        $show = $Page->show();
        $this->assign('show', $show);
        $p = $Page->firstRow;
        $this->p = $Page->firstRow;
        $this->data = $data;
        $this->display('Infomation');
    }
    //查询站内信息是否已读
    public function infoRead(){
        $id = I('get.id');
        $email = M('email_user');
        $data = $email->where(array('id'=>$id))->save(array('is_read'=>1));
        //dump($id);
        $this->ajaxReturn($data,'json');
    }

    //显示安全设置
    public function safe()
    {
        $read = M('User')->where("id=" . session("name.id"))->getField('real');
        if ($read == 0) {
            if(IS_POST){
                $res = sendMail('安全认证', '欢迎验证请注意您的个人账户安全', I('post.email'));
                M('User')->where("id=" . session("name.id"))->setField('real',1);
                    $this->redirect('Member/safe');
            }else{
                $this->display('safe2');
            }

        } else {
            $this->display('safe');
        }

    }
    public function checkSafe(){
        if(IS_AJAX) {
            $code = I('get.sms');
            if($_SESSION['code']==$code){

                $this->ajaxReturn(array('1','认证成功'));
            }
        }else{
            $this->ajaxReturn(array(0,'验证码不正确'));
        }
    }

    //显示推存好友
    public function recommend()
    {
        $this->display('Recommend');
    }
    public function send()
    {
        $code = rand(1000, 9999);
//        include_once("./CCPRestSDK.php");
        $telphone = $_GET['tel'];
        $res = sendTemplateSMS($telphone, array($code, 1), "1");//手机号码，替换内容数组，模板ID
        $_SESSION['code'] = $code;
        //Demo调用
        //**************************************举例说明***********************************************************************
        //*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
        //*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
        //*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
        //*********************************************************************************************************************
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }

    }


}


?>