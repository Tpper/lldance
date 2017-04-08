<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class EmailuserModel extends RelationModel{
    //定义自动完成
    protected $_auto = array(
        array('addtime','time',1,'function'),
        array('send_id','getSendId',1,'callback'),
    );
    //获取send_id的函数
    protected function getSendId (){
        return session('name.id');
    }
    //自动验证
    protected $_validate = array(
        array('title','require','标题不能为空!',1),
        array('receive_id','require','请选择收件人!',1),
        array('content','require','内容不能为空!',1),

        );
    
    protected function checkRid($a){
    	if($a = 0){
    		return false;
        }
            return true;
    }

}




?>