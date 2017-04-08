<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="十七金融">
    <meta name="author" content="十七金融">
    <link href="/Public/Home/css/css.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <link href="/Public/Home/css/ie.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=8">

    <![endif]-->
    <!--[if lte IE 6]>
    <meta http-equiv="refresh" content="0;url=IE6/IE6.html"><![endif]-->
    <link href="favicon.ico" rel="SHORTCUT ICON">
    <!--<script src="/Public/Home/js/jquery.js"></script>-->
    <script src="/Public/Home/Plugins/laydate/laydate.js"></script>
    <script src="/Public/Home/Plugins/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.js"></script>



    <title>十七金融</title>
</head>
<body cur="2"><!--head-->
<!--head-->
<div class="top">
    <div class="wrap clearfix">
        <em class="myfont">&#xe632;</em><span class="songti">服务热线：</span><span class="tel">400-121-8232</span>
        <a href="#" target="_blank" class="ico weibo"></a>
        <a href="#" target="_blank" class="ico weixin"></a>
        <a href="#" target="_blank" class="ico qq"></a>
        <span class="fr">
            <?php if(isset($_SESSION['name'])): ?><a href="<?php echo U('Member/member');?>" class="loginbtn" id="loginbtn"><?php echo ($_SESSION['name']['pname']); ?></a>
            <a href="javascript:;" class="o regbtn" id="logout">退出</a>
            <a href="<?php echo U('Member/member');?>">个人中心</a>
            <?php else: ?>
            <a href="javascript:;" class="loginbtn" id="loginbtn1">登录</a>
            <a href="<?php echo U('Login/register');?>" class="o regbtn" id="register">免费注册</a>
            <a href="#">帮助中心</a><?php endif; ?>
        </span>
    </div>
</div>
<div class="head">
    <div class="wrap pct-h clearfix">
        <a href="<?php echo U('Index/index');?>" class="logo indent">logo</a>
        <div class="adtxt indent">有钱没钱，找十七金融</div>
        <ul class="nav">
            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
            <li><a href="<?php echo U('InvestList/invest_list');?>">我要投资</a></li>
            <li><a href="<?php echo U('Borrow/borrow');?>">我要借款</a></li>
            <li><a href="about.html">关于我们</a></li>
        </ul>
    </div>
</div>
<script src="/Public/Home/js/jquery.js"></script>
<script src="/Public/Home/Plugins/layer/layer.js"></script>

<script>
    //弹出一个iframe层
    $('#loginbtn1').on('click', function () {
        layer.open({
            type: 2,
            title: '登录',
            maxmin: true,
            // shadeClose: false, //点击遮罩关闭层
            shade: 0,
            area: ['300px', '200px'],
            content: "<?php echo U('Index/login');?>"
        });
//        alert(222);
    });

</script>
<!--main-->
<div class="wrap mt10">
    <!--<div class="tc"><img src="/Public/Home/images/step.png"></div>-->
    <div class="clearfix">
        <!--img-->
        <div class="img loans-img bdr fl">
            <div class="lj indent">ico</div>
            <img src="/Public/Home/images/img6.jpg">
        </div>
        <div class="formbox bdr fr">
            <form action="" method="post">
            <table class="productForm">
                <tr>
                    <th>昵称</th>
                    <td>
                        <label class="touzi01">
                            <input type="text" id="realName" name="pname" class="input_all input_1" maxlength="15"
                                   placeholder="昵称" index="1" onkeydown="fo(event,1)" onblur="check_user()"/>
                        </label>
                        <div class="tishi"><span id="realNameError" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>
                <!--<tr>
                    <th>邮箱</th>
                    <td>
                        <label class="touzi01">
                            <input type="text" id="mobile" name="email" class="input_all input_1"
                                   placeholder="邮箱" index="2" onkeydown="fo(event,2)"/>
                        </label>
                        <div class="tishi"><span id="mobileError" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>-->
                <tr>
                    <th>性别</th>
                    <td class="hight">
                        <label><input name="sex" type="radio" value="男" index="3" onkeydown="fo(event,3)" checked>男</label>
                        <label><input name="sex" type="radio" value="女" index="4" onkeydown="fo(event,4)">女</label>
                    </td>
                </tr>
                <tr>
                    <th>出生日期</th>
                    <td>
                        <label class="touzi01">
                            <input onclick="laydate()" type="text" id="birthday" name="birthday"
                                   class="input_all i_time input_1"
                                   style="z-index:1000;position:relative; width:227px" index="5" onkeydown="fo(event,5)"/>
                        </label>
                        <div class="tishi"><span id="birthdayError" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>
                <tr>
                    <th>密码</th>
                    <td>
                        <label class="touzi01">
                            <input type="password" id="mobile1" name="password" class="input_all input_1" maxlength="11"
                                   placeholder="密码" index="6" onkeydown="fo(event,6)"/>
                        </label>
                        <div class="tishi"><span id="mobileError1" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>
                <tr>
                    <th>重复密码</th>
                    <td>
                        <label class="touzi01">
                            <input type="password" id="mobile2" name="pwd" class="input_all input_1" maxlength="11"
                                   placeholder="再次输入密码" index="7" onkeydown="fo(event,7)"/>
                        </label>
                        <div class="tishi"><span id="mobileError2" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>
                <tr>
                    <th>验证码</th>
                    <td >
                        <label class="touzi01" >
                            <input style="width: 150px" type="text" id="verify" name="yzm" class="input_all input_1" maxlength="11"
                                   placeholder="请输入验证码" index="8" onkeydown="fo(event,8)"/>
                                <img src="<?php echo U('Login/verify');?>"
                                     width="90" height="40" style="float:right;position: relative; right:72px;top:-4px"
                                     onclick="this.src='/index.php/Home/Login/verify/t'+Math.random()">

                        </label>
                        <div class="tishi"><span id="mobileError4" class="prompt_2 hidden"></span></div>
                    </td>
                </tr>
                <th id="show"></th>
                <td><input type="button" id="save" value="立即申请" class="btn btnSize_6 btn_orange"/></td>
            </table>
            </form>
        </div>
    </div>

    <div class="detailsBox mt20 clearfix">
        <div class="item first">
            <div class="title">申请资格</div>
            <ul class=" mt10 cicle">
                <li>年龄23周岁-60周岁的中国大陆公民（港、澳、台除外）</li>
                <li>企业或商户经营时间满1年及以上</li>
                <li>企业或商户月均流水须3万以上</li>
            </ul>
        </div>
        <div class="item">
            <div class="title">额度期限</div>
            <ul class=" mt10 cicle">
                <li>借款额度：3万-30万元</li>
                <li>借款期限：12、18、24个月</li>
                <li>还款方式：等额本息，每月还款</li>
            </ul>
        </div>
        <div class="item bd0">
            <div class="title">所需材料</div>
            <ul class=" mt10 cicle">
                <li>申请人二代身份证</li>
                <li>企业/商户经营场所证明材料</li>
                <li>近6个月对公或对私银行流水或POS交易流水</li>
            </ul>
        </div>
    </div>
</div>
<script>
 $('input[type=button]').click(function(){
     var pn = $('input[name=pname]').val();
//     var em = $('input[name=email]').val();
     var se = $('input[name=sex]').val();
     var bir = $('input[name=birthday]').val();
     var pwd = $('input[name=password]').val();
     var yzm = $('input[name=yzm]').val();
     var rpwd = $('input[name=pwd]').val();
        console.log(pn);
     $.post("<?php echo U('Login/register');?>",{pname:pn,sex:se,birthday:bir,password:pwd,yzm:yzm,pwd:rpwd},function(e){
         if(e[0]==0){
             layer.config({
                 offset: ['20%', '70%']       //设置提示层坐标
             })
             layer.msg(e[1]);
//             console.log($('img[src='+<?php echo U('Login/verify');?>+']'));
             $('input[name=yzm]+img').attr('src','/index.php/Home/Login/verify/t'+Math.random());    //验证不通过刷新验证码
         }else{
             window.location.href="<?php echo U('Login/login2');?>";
         }
             },'json')


 });
 function fo(event,i){
     // alert(i);
     var len = $('input').length;
     if(i!=len-1&&event.keyCode==13){
         // alert(i);
         var a=i+1;
         // alert(a);
         $('input[index='+a+']').focus();
     }else{

     }

 };

</script>
<!--Partner-->
<div class="Partner mt10">
    <div class="wrap clearfix">
        <div class="hd fl">
            <b>合作伙伴</b>
            <span class="en">Partners</span>
        </div>
        <div class="bd fr">
            <div id="Marquee_x">
                <ul>
                    <li>
                        <a href="http://www.cardanro.com.cn" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_03.jpg"></a>
                        <a href="http://www.hsbank.com.cn" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_06.jpg"></a>
                        <a href="http://www.hongren.com.cn" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_08.jpg"></a>
                        <a href="http://www.boc.cn" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_11.jpg"></a>
                        <a href="http://www.xtep.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_14.jpg"></a>
                        <a href="http://www.edenbo.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_17.jpg"></a>
                        <a href="http://www.ayilian.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_19.jpg"></a>
                        <a href="http://www.tonlion.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_22.jpg"></a>
                        <a href="http://mall.jd.com/index-34890.html" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_25.jpg"></a>
                        <a href="http://www.cmbc.com.cn" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_28.jpg"></a>
                        <a href="http://itisf4.tmall.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_31.jpg"></a>
                        <a href="http://www.cebbank.com" target="_blank" class="img"><img
                                src="/Public/Home/upload/logo_33.jpg"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--foot-->
<div class="foot">
    <div class="wrap clearfix">
        <div class="footsection fl">
            <a href="about.html">关于我们</a> | <a href="news.html">网站公告</a> | <a href="reports.html">媒体报道</a> | <a
                href="partners.html">合作伙伴</a> | <a href="#">安全保障</a> | <a href="#">本金保障</a> | <a href="#">帮助中心</a> | <a
                href="#">如何投资</a> | <a href="#">如何借款</a>
            <p class="mt10">Copyright 2014 十七贷款, All Rights Reserved 版权所有 沪ICP备00000000号</p>
            <div class="img mt15 clearfix">
                <a href="#" target="_blank"><img src="/Public/Home/images/img1.jpg"></a>
                <a href="#" target="_blank"><img src="/Public/Home/images/img2.jpg"></a>
                <a href="#" target="_blank"><img src="/Public/Home/images/img3.jpg"></a>
                <a href="#" target="_blank"><img src="/Public/Home/images/img4.jpg"></a>
                <a href="#" target="_blank"><img src="/Public/Home/images/img5.jpg"></a>
            </div>
        </div>
        <div class="footaside fr">
            热线电话 (服务时间 09:00 - 21:00 )
            <p><span class="tel">400-601-6629</span><a href="#" target="_blank">在线客服<em class="ico"></em></a></p>
            关注我们 <a href="#" target="_blank" class="ico weibo"></a> <a href="#" target="_blank"
                                                                       class="ico weixin"></a><a href="#"
                                                                                                 target="_blank"
                                                                                                 class="ico qq"></a>
        </div>
    </div>
</div>

<div class="Pop-up">
    <div class="pop-bd">
        <div class="hand">
            <div class="myfont close">&#xe611;</div>
        </div>
        <div class="bd" id="form1">
            <div class="hd">会员登录</div>
            <div class="txt"><h1>为您提供简单、安全、高收益的理财服务</h1>优先选择有担保的优质债权 足值抵押物可以降低风险 分散投资，更能降低风险</div>
            <div class="form">
                <label><span>用户名</span><input type="text" class="form-control first" value="" name="name"></label>
                <label><span>密码</span><input type="password" class="form-control last" value="" name="name"></label>
                <button type="button" value="" class="button login" id="login"
                        onclick="window.location.href='user.html'">登录
                </button>
                <div class="mt15"><a href="javascript:;" id="btnreg">没有帐号？</a>&nbsp;|&nbsp;<a href="#">忘记密码？</a></div>
            </div>
        </div>
        <div class="bd none" id="form2">
            <div class="hd">会员注册</div>
            <div class="txt"><h1>为您提供简单、安全、高收益的理财服务</h1>优先选择有担保的优质债权 足值抵押物可以降低风险 分散投资，更能降低风险</div>
            <div class="form">
                <label><span>用户名</span><input type="text" class="form-control first" value="" name="name"></label>
                <label><span>手机</span><input type="text" class="form-control" value="" name="name"></label>
                <label><span>密码</span><input type="password" class="form-control" value="" name="name"></label>
                <label><span>确认密码</span><input type="password" class="form-control last" value="" name="name"></label>
                <button type="button" value="" class="button login" id="reg"
                        onclick="window.location.href='user.html'">注册
                </button>
                <div class="mt15"><a href="javascript:;" id="btnlogin">没有帐号？</a>&nbsp;|&nbsp;<a href="#">忘记密码？</a></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>