<?php
namespace Admin\Controller;
use Boris\ReadlineClient;
use Think\Cache\Driver\Redis;
use Think\Controller;

class BorrowController extends Controller {
    //显示借款页面
    public function index(){
        $borrow = M('borrow');
        //(总记录数, 每页显示多少条默认20条, 分页链接的其他参数默认空数组);
        $count = $borrow->count(); //总记录数的查询条件要和下面select方法的查询条件一致
        $Page = new \Think\Page($count, 5);
        $data = $borrow->limit($Page->firstRow, $Page->listRows)->select();
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 个会员</span>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();
        $this->assign('show', $show);
        //dump($data);
        $this->assign('data',$data);
        $this->display();
    }

  /*  public function index(){
        $borrow = M('borrow');
        $data = $borrow->select();
        $this->assign('data',$data);
        $this->display();
    }*/

    //取出数据
    public function showlist(){
        //I方法获取id
        $id = I('get.id');
        M('borrow')->save(array('id'=>$id,'is_read'=>1));
        $data = M('borrow')->find($id);//获取数据库数据
        $this->assign('data',$data);
        $this->display('showlist');

    }
    public function status()
    {
        $cid = I('post.cid'); //获取
        $id = I('post.id');
        $borrow = M('borrow');
       // file_put_contents('tet.txt', $cid);
        if ($cid == 3) {
            $arr['is_read'] = $cid;
            $borrow->where('id=' . $id)->save($arr);
            $this->ajaxReturn(array('3', '已通过'));
        } elseif ($cid == 2) {
            $arr['is_read'] = $cid;
            $borrow->where('id=' . $id)->save($arr);
            $this->ajaxReturn(array('2', '已拒绝'));

        }
    }

    public function tongji(){
        $sql = "select is_read from borrow";
        $data = M()->query($sql);
        /*dump($data);
        die();*/
       /* $str = '[';*/
       /* foreach($data as $key=>$value){
            $str .= "['".$value['is_read'] .']';
        }
        $str = rtrim($str,',');
        $str .= "]";*/
        $this->assign('data',$data);
        $this->display();

    }
}

?>