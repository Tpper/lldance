<?php
namespace Home\Model;
use Think\Model;

class PersonalInvestModel extends Model
{
    //取出当前用户的投资信息
    public function invest($id)
    {
        /*return  M('personalInvest')->alias('p')->field('p.*,i.project_name')
            ->join('invest_list i on p.project_id= i.project_id')
            ->where("user_id=$id")->select();*/
        return M('personalInvest')->where("user_id=$id")->count('amount');                  //取出用户的投资总额
    }

    //取出当前用户所有投资收益
    public function gains($id)
    {
        $obj = M('personalInvest');
       $gain = $obj->alias('p')
           ->join('left join invest_list i on p.project_id=i.project_id')
           ->where(array('p.user_id'=>$id))->field('p.amount,i.rate')->select();           //查询用户所有的投资项目对应的金额与利率
        $sum = 0;
        foreach ($gain as $key=>$value){                                                    //计算预期总收益
            $sum += $value['amount']*$value['rate'];
        }
        return $sum;
    }
}


?>