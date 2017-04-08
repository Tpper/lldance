<?php
namespace Home\Controller;
use Think\Controller;
class InvestListController extends Controller{
    //显示所有投资产品
    public function invest_list(){
        $obj = D('InvestList');
        $info = $obj->show();
        $this->assign('info',$info);
        $this->display('invest/invest_list');

    }
}


?>