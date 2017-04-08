<?php
namespace Home\Controller;
use Think\Controller;
class InvestController extends Controller{
    //载入模板
    public function invest(){
    	$this->display();
    }

    //显示所有投资产品并分页
    public function investList(){
        // $obj = D('InvestList');
        // $info = $obj->show();
        // $this->assign('data',$info);
        // $this->display();
        $dept = M('invest_list');
        //实例化分页类
        $count =$dept->count();//总记录数
        //var_dump($count);die;
        $Page = new\Think\Page($count,2);
        $data = $dept->limit($Page->firstRow, $Page->listRows)->select();
        // echo "<pre>";
        // print_r($data);die;
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 个项目</span>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();
        $this->assign('data',$data);
        //print_r($data);die;
        $this->assign('show', $show);
        $this->display();

    }

    public function investShow(){
        //var_dump($_GET);die;
        $obj = M('invest_list');
        $data = $obj->where(array('project_id'=>$_GET['project_id']))->find();
        //echo "<pre>";
        //print_r($data);die;
        $this->assign('data',$data);
        $this->display();
    }
}
