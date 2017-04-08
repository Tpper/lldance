<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
    //自动完成
    protected $_auto=array(
        //array(完成的字段，完成规则，[完成时间,附加规则])
        array('addtime', 'time', 1, 'function'),

    );
    //自动验证
    protected $_validate=array(
        //array(验证字段，验证规则，错误提示，[验证条件，附加规则，验证时间])
        array('name','require','用户名不能为空',1),
        array('password','require','密码不能为空',1,'regex'),

    );

    //改变登录状态的方法
    public function checkLog($uname){
        $user = M('User');
        $arr['name']=$uname;
        $str = $user->where($arr)->field('is_log')->find();
//        if($str==0){
//            $arr = array(
//                'is_log'=>1
//            );
//            $user->where($arr)->save();
//        }else{
//            $arr=array(
//                'is_log'=>0
//            );
//            $user->where($arr)->save();
//        }
        if($str==0) $arr = array('is_log'=>1);
        $arr = array('is_log'=>0);
        $user->where($arr)->save();
    }
}




?>