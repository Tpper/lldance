<?php
namespace Home\Model;
use Think\Model;
class PropertyModel extends Model{
    //取出当前登录用户的资金信息
    public function mon($id){
        $obj = M('property');
        $money = $obj->where("user_id=$id")->field('money')->find();
        return $money;
    }
    
}

?>