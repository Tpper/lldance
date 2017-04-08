<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="">
<meta name="description" content="十七金融">
<meta name="author" content="十七金融">
<link href="/Public/Home/css/css.css" rel="stylesheet">
<!--[if lt IE 9]-->
    <link href="/Public/Home/css/ie.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="X-UA-Compatible" content="IE=8" >
    <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/Plugins/laydate/laydate.js"></script>
  <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
  <script class="resources library" src="/Public/Home/js/area.js" type="text/javascript"></script>

<!--[endif]-->
<!--[if lte IE 6]><meta http-equiv="refresh" content="0;url=IE6/IE6.html"><![endif]-->
<link href="favicon.ico" rel="SHORTCUT ICON">
<title>十七金融</title>
    <style type="text/css">

        a{ color:#006600; text-decoration:none;}
        a:hover{color:#990000;}
        .top{ margin:5px auto; color:#990000; text-align:center;}
        .info select{ border:1px #FFFFFF solid; background:#FFFFFF; padding: 4px 0;}
        .info{ margin:4px;}
        .info #show{ color:#3399FF; }
        .borrow{border:1px #FFFFFF solid;  margin-left: -4px;}
    </style>
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
  <div class="tc"><img src="/Public/Home/images/step.png"></div>
  <div class="clearfix">
    <!--img-->
    <div class="img loans-img bdr fl">
      <div class="lj indent">ico</div>
      <img src="/Public/Home/images/img6.jpg">
    </div>
    <form action="" method="post" enctype="multipart/form-data" >
    <div class="formbox bdr fr">
      <table class="productForm">
        <tr>
          <th>居住城市</th>
          <td>

            <div class="info">
              <div class="borrow">

                <select id="s_province" name="s_province" onchange="f1()" ></select>
                <select id="s_city" name="s_city" ></select>
                <select id="s_county" name="s_county"></select>



                <script type="text/javascript">_init_area();</script>

              </div>
            </div>
            <script type="text/javascript">
              var Gid  = document.getElementById ;
              var showArea = function(){
                Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
                        Gid('s_city').value + " - 县/区" +
                        Gid('s_county').value + "</h3>"
              }
              Gid('s_county').setAttribute('onchange','showArea()');
            </script>
            <div class="tishi"><span id="realNameError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th>真实姓名</th>
          <td>
          	<label class="touzi01">
              <input type="text" id="realName" name="name" class="input_all input_1" maxlength="15"/>
              <span>请输入真实姓名</span>
            </label>
            <div class="tishi"><span id="realNameError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th>移动电话</th>
          <td>
            <label class="touzi01">
              <input type="text" id="mobile" name="tel" class="input_all input_1" maxlength="11"/>
              <span>请输入11位手机号</span>
            </label>
            <div class="tishi"><span id="mobileError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th>称谓</th>
          <td class="hight">
            <label><input name="sex" type="radio" value="男" checked>先生</label>
            <label><input name="sex" type="radio" value ="女">女士</label>
          </td>
        </tr>
        <tr>
          <th>出生日期</th>
          <td>
            <label class="touzi01">
              <input onclick="laydate()" type="text" readonly id="birthday" name="birthday" class="input_all i_time input_1" style="z-index:1000;position:relative; width:227px"/>
              <span>yyyy-mm-dd</span>
            </label>
            <div class="tishi"><span id="birthdayError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th>借款金额</th>
          <td>
            <label class="touzi01">
              <input type="text" id="loanAmount" name="amount" class="input_all i_yuan input_1" maxlength="7"/>
              <span>3万-30万</span>
            </label>
            <div class="tishi"><span id="amountError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th>借款期限</th>
          <td>
            <select id="js_dueId" name="date" class="select1">
              <option value="12个月">12个月</option>
              <option value="18个月">18个月</option>
              <option value="24个月">24个月</option>
            </select>
            <div class="tishi"></div>
          </td>
        </tr>
        <tr>
          <th>月均收入</th>
          <td>
            <label class="touzi01">
              <input type="text" id="income" name="income" class="input_all i_yuan input_1" maxlength="9"/>
              <span>请填写月收入金额</span>
            </label>
            <div class="tishi"><span id="incomeError" class="prompt_2 hidden"></span></div>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" id="save" value="立即申请" class="btn btnSize_6 btn_orange" /></td>
        </tr>
      </table>
     </div>
  </form>
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

<script src="js/jquery.js"></script>
<script src="js/Action.js"></script>
<script src="js/waste.js"></script>
<script src="js/banner.js"></script>
<script src="js/jQuery-jcMarquee.js"></script>



<script type="text/javascript" src="js/VisitorAPI-1.2.1-min.js"></script>
<script type="text/javascript" src="js/AppMeasurement-1.2.1-min.js"></script>

<!--时间  s-->
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<link href="/Public/Home/css/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--时间  e
<script language="javascript">
		var staticCss = 'http://static.niwodai.com/Public/Static/201404';
		var cssVersion = '2015010618';
		var staticUrl = 'http://static.niwodai.com/';
</script> -->
<script src="js/loanApplyValidate.js?v=2015010618.js" type="text/javascript"></script>
<script src="js/detail.js?v=2015010618.js" type="text/javascript"></script>
<script src="js/netCredit.js?v=2015010618.js" type="text/javascript"></script>
<script src="js/loanApplyCitys.js?v=2015010618.js" type="text/javascript"></script>

<script>
$(function(){
	//--输入框内提示-------------
			$(".touzi01 .input_1").each(function(){
				 var thisVal=$(this).val();
				 if(thisVal!=""){
				   $(this).siblings("span").hide();
				  }else{
				   $(this).siblings("span").show();
				  }
				 $(this).focus(function(){
				   $(this).siblings("span").hide();
				  }).blur(function(){
					var val=$(this).val();
					if(val!=""){
					 $(this).siblings("span").hide();
					}else{
					 $(this).siblings("span").show();
					} 
				  });
				});
})
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
            <a href="http://www.cardanro.com.cn" target="_blank" class="img"><img src="/Public/Home/upload/logo_03.jpg"></a>
            <a href="http://www.hsbank.com.cn" target="_blank" class="img"><img src="/Public/Home/upload/logo_06.jpg"></a>
            <a href="http://www.hongren.com.cn" target="_blank" class="img"><img src="/Public/Home/upload/logo_08.jpg"></a>
            <a href="http://www.boc.cn" target="_blank" class="img"><img src="/Public/Home/upload/logo_11.jpg"></a>
            <a href="http://www.xtep.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_14.jpg"></a>
            <a href="http://www.edenbo.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_17.jpg"></a>
            <a href="http://www.ayilian.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_19.jpg"></a>
            <a href="http://www.tonlion.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_22.jpg"></a>
            <a href="http://mall.jd.com/index-34890.html" target="_blank" class="img"><img src="/Public/Home/upload/logo_25.jpg"></a>
            <a href="http://www.cmbc.com.cn" target="_blank" class="img"><img src="/Public/Home/upload/logo_28.jpg"></a>
            <a href="http://itisf4.tmall.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_31.jpg"></a>
            <a href="http://www.cebbank.com" target="_blank" class="img"><img src="/Public/Home/upload/logo_33.jpg"></a>
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
      <a href="about.html">关于我们</a>  |  <a href="news.html">网站公告</a>  |  <a href="reports.html">媒体报道</a>  |  <a href="partners.html">合作伙伴</a>  |  <a href="#">安全保障</a>  |  <a href="#">本金保障</a>  |  <a href="#">帮助中心</a>  |  <a href="#">如何投资</a>  |  <a href="#">如何借款</a>
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
      关注我们  <a href="#" target="_blank" class="ico weibo"></a> <a href="#" target="_blank" class="ico weixin"></a><a href="#" target="_blank" class="ico qq"></a>
    </div>
  </div>
</div>

<div class="Pop-up">
  <div class="pop-bd">
    <div class="hand"><div class="myfont close">&#xe611;</div></div>
    <div class="bd" id="form1">
      <div class="hd">会员登录</div>
      <div class="txt"><h1>为您提供简单、安全、高收益的理财服务</h1>优先选择有担保的优质债权 足值抵押物可以降低风险 分散投资，更能降低风险</div>
      <div class="form">
        <label><span>用户名</span><input type="text" class="form-control first" value="" name="name"></label>
        <label><span>密码</span><input type="password" class="form-control last" value="" name="name"></label>
        <button type="button" value="" class="button login" id="login" onclick="window.location.href='member.html'">登录</button>
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
        <button type="button" value="" class="button login" id="reg" onclick="window.location.href='member.html'">注册</button>
        <div class="mt15"><a href="javascript:;" id="btnlogin">没有帐号？</a>&nbsp;|&nbsp;<a href="#">忘记密码？</a></div>
      </div>      
    </div>
  </div>
</div>

<script>
  ;!function(){

//laydate.skin('molv');
    laydate.skin('molv')
    laydate({
      elem: '#birthday'
    })

  }();
</script>

<script>

$(function(){
    $('#Marquee_x').jcMarquee({ 'marquee':'x','margin_right':'10px','speed':20 });	
	$(".loginbtn").click(function(){
		$(".Pop-up").show();
		$(".pop-bd").slideDown(500);
		$("#form2").hide().siblings("#form1").show();
	});
	$(".regbtn").click(function(){
		$(".Pop-up").show();
		$(".pop-bd").slideDown(500);
		$("#form1").hide().siblings("#form2").show();
	});
	$("#btnreg").click(function(){$(this).parents("#form1").hide().siblings("#form2").show();})
	$("#btnlogin").click(function(){$(this).parents("#form2").hide().siblings("#form1").show();})
	$(".close").click(function(){$(this).parents(".Pop-up").hide().find(".pop-bd").hide()});
	
	$(".form .form-control").each(function(){
		var thisVal=$(this).val();
		if(thisVal!=""){
			$(this).siblings("span").hide();
		}
		else{
			$(this).siblings("span").show();
		}
		$(this).focus(function(){
			$(this).siblings("span").hide().parents("label").css("z-index","10009").siblings("label").css("z-index","10008");
		}).blur(function(){
			var val=$(this).val();
			if(val!=""){
				$(this).siblings("span").hide().siblings("label").css("z-index","10008");
				}
			else{
				$(this).siblings("span").show().siblings("label").css("z-index","10008");
			} 
		});
	});
});
</script>
</body>
</html>

<script>
  $(function () {
    //点击确定,提交表单
    $('.confirm').click(function () {
      $('form').submit(); //submit 是jquery中的函数,直接使用jQuery对象来调用
    })
</script>