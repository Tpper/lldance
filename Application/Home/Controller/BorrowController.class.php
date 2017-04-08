<?php
namespace Home\Controller;
use Think\Controller;

class BorrowController extends Controller {
    public function borrow(){
        if(IS_POST){
            $borrow = M('borrow');
            if ($_SESSION != null){

            $arr = array(
                'name'     => I('post.name'),
                'city'     => I('post.s_province').I('post.s_city').I('post.s_county'),
                'tel'      => I('post.tel'),
                'sex'      => I('post.sex'),
                'birthday' => I('post.birthday'),
                'amount'   => I('post.amount'),
                'date'     => I('post.date'),
                'income'   => I('post.income'),
                'user_id'  => $_SESSION['name']['id'],
                'time'     => time(),
                'is_read'   =>0,
            );
               /* dump($arr);
                die();*/
                if ($borrow->add($arr)){
                    $this->success('填写成功',U('Index/index'));
                }else{
                    $this->error('填写失败');
                }
            }else{
                $this->error('填写失败,请先登录');
            }
            //dump($arr);
            //die();
        }else{

            $this->display('borrow');
        }
    }
}


?>