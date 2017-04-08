<?php
namespace Admin\Model;
use Think\Model;

class BorrowModel extends Model{
    //自动完成
    protected $_auto = array(
        array('time','time',1,'function'),

    );
}


?>