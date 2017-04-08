<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//显示主界面和平台数据
    public function index(){

    	$borw = M('borrow');
    	$ivst = M('personal_invest');
    	$this->borrow = $borw->count('id');
    	$this->borMoney = $borw->sum('amount');
    	$this->invst = $ivst->count('id');
    	$this->invstMoney = $ivst->sum('amount');
        $data = M('invest_list')->limit(4)->select();
        $this->assign('data',$data);
        $this->display();
	}
    //理财风云榜
    public function FenyunBang(){

        $user= M('User')->find($id);
        // var_dump($user);die;
        $this->assign('user',$user);
        $this->display('index');
    }




}