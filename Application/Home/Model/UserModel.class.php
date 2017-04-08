<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    //自动完成
    protected $_auto=array(
        array('time','time',1,'function'),                               //time字段使用time函数自动完成
        array('password','md5',1,'function')                             //密码md5加密
    );
    //自动验证
    protected $_validate = array(
        //array(验证字段，验证规则，错误提示，[验证条件，附件规则，验证时间])；
        array('pname','require','用户名不能为空',1),                        //用户名必填
        array('password','require','密码不能为空',1),                      //密码不能为空
        array('password','checkPwd','密码不能包含特殊字符',1,'callback'),
      /*  array('email','email','邮箱格式不正确',1,'regex'),
        array('email','require','邮箱格式不能为空',1),*/
        array('password','pwd','两次密码输入的不一致',1,'confirm'),           //两次输入的密码必须一致
    );
    //验证密码不能包含特殊字符
    protected function checkPwd($pwd){
        $pattern = '/[!@#$%^&*()\-+{}|:"<>?_=\[\];\',\/\\\]/';
        if(preg_match($pattern,$pwd)){
            return false;
        }else{
            return true;
        }
    }
/*    //账号以字母开头长度在6-18位只能含字母数字下划线
    protected function checkName($pname){
        $pattern = '/^[a-zA-Z][a-zA-Z0-9_]{4,15}/';
        if(preg_match($pattern,$pname)){
            return true;
        }else{
            return false;
        }
    }*/
}

?>