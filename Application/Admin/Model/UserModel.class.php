<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model
{
    //自动加载时间
    protected $_auto = array(
        array('time','time',1,'function'),
        array('password','youmd5',1,'callback'),
    );
     protected function youmd5($str){
    return md5($str);
 }
}
?>