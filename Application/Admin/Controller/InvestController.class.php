<?php
namespace Admin\Controller;
use Think\Controller;
class InvestController extends Controller {
    
    //显示项目列表并且分页
    public function investList(){
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

    //显示项目模板
    public function add(){
    	$data = M('invest_type')->select();
    	// echo "<pre>";
    	// print_r($data);
    	// echo "</pre>";die;
    	$this->assign('data',$data);
    	$this->display();
    }
    //执行添加项目的方法
    public function addHandle(){
    	// echo "<pre>";
    	// print_r($_POST);
    	// echo "</pre>";die;
        $obj = M('invest_list');
        if($obj->add($_POST)){
            $this->success('添加成功',U('investList'));
        }else{
            $this->error('添加失败');
        }
    }

    //删除单个项目方法
    public function del(){
  //   	$obj = D('invest_list');
  //   	//echo "1";
		// $obj->delete($_GET['id']);
		if(M('invest_list')->delete($_GET['id'])){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}
    }
    
    //显示投资人投资状态
    public function investStatus(){
        $obj = M('personal_invest');
        //print_r($data);die;
        $data = $obj->join('user on personal_invest.user_id = user.id')->join('invest_list on personal_invest.project_id=invest_list.project_id')->join('join invest_type on invest_list.type_id=invest_type.type_id')->select();
        // $obj2 = M('invest_list');
        // $data2 = $obj2 ->join('invest_type on invest_list.type_id=invest_type.id')->select();
        // echo "<pre>";
        // print_r($data);die;
        //print_r($data2);die;
        $this->assign('data',$data);
        $this->display();
    }

    //批量删除方法
    public function delAll(){
        $data = $_POST;
        var_dump($data);die;

        // $obj = M('post');
        // $id = I('post.id');
        // $ids = join(',',$id);

        // $data = $model->where(array('id' => array('in', $ids)))->delete();
        //     if($data){
        //     $this->success("删除成功", U('post/index'));
        //     }else{
        //     $this->error("删除失败");
        //     }
        // }
}

}