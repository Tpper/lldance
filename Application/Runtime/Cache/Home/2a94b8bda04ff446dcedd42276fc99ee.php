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
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <script src="/Public/Home/js/jquery.js"></script>

    <![endif]-->
    <!--[if lte IE 6]>
    <meta http-equiv="refresh" content="0;url=IE6/IE6.html"><![endif]-->
    <link href="favicon.ico" rel="SHORTCUT ICON">
    <title>十七金融</title>
</head>
<body>
<!--head-->
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
            <li><a href="<?php echo U('Invest/invest');?>">我要投资</a></li>
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

<!--banner-->
<div class="banner">
    <div id="inner">
        <div class="hot-event">
            <div class="switch-nav">
                <a href="#" onClick="return false;" class="prev"><i class="ico i-prev"></i><span
                        class="hide-clip">上一个</span></a>
                <a href="#" onClick="return false;" class="next"><i class="ico i-next"></i><span
                        class="hide-clip">下一个</span></a>
            </div>
            <div class="event-item"
                 style="background-color:#c20000; background-image:url(/Public/Home/upload/img4.jpg);"><a
                    href="index.html" title="十七金融"></a></div>
            <div class="event-item"
                 style="background-color:#c20000; background-image:url(/Public/Home/upload/img4.jpg);"><a
                    href="index.html" title="十七金融"></a></div>
            <div class="event-item"
                 style="background-color:#c20000; background-image:url(/Public/Home/upload/img4.jpg);"><a
                    href="index.html" title="十七金融"></a></div>
            <div class="switch-tab"></div>
            <div class="regbox">
                <h2>预期年化收益率</h2>
                <h1>12<span>%</span> -14<span>%</span></h1>
                <a href="javascript:;" class="button btn-reg regbtn">免费注册</a>
                <p class=" mt10 tr"><a href="javascript:;" class="button btn-login loginbtn">马上登录</a></p>
            </div>
        </div>
    </div>
</div>

<!--Platform-data-->
<div class="Platform-data">
    <div class="hd">
        <div class="wrap clearfix">
            <div class="title fl">平台数据<em class="gt indent">三角形</em></div>
            <div class="data fr">
                <div class="item"><span class="count"><?php echo ($borrow); ?></span>人实现借款</div>
                <div class="item"><span class="count"><?php echo ($invst); ?></span>人成功投资</div>
                <div class="item"><span class="count"><?php echo (floor($invstMoney)); ?></span>笔成功投资</div>
                <div class="item"><span class="count"><?php echo ($borMoney+$invstMoney); ?></span>万元成交金额</div>
            </div>
        </div>
    </div>
    <div class="wrap bd clearfix">
        <div class="item">
            <div class="ico-data data1 indent">高收益灵活投资</div>
            <b class="f14">高收益灵活投资</b><br>50元起投<br>预期12%-14%年化收益率<br>投资90天后即可债权转让
        </div>
        <div class="item">
            <div class="ico-data data2 indent">一站式借款服务</div>
            <b class="f14">一站式借款服务</b><br>无抵押信用贷款<br>24小时放款<br>提前还款可减免服务费
        </div>
        <div class="item">
            <div class="ico-data data3 indent">全方位安全保障</div>
            <b class="f14">全方位安全保障</b><br>5道安全防线<br>100%本金保障计划<br>专业的第三方资金托管
        </div>
        <div class="item">
            <div class="ico-data data4 indent">万国实力</div>
            <b class="f14">万国实力</b><br>十一家子公司<br>小额贷款公司<br>担保公司
        </div>
    </div>
</div>

<!--main-->
<div class="wrap mt10 clearfix">
    <div class="indexsection fl">
        <!--净值标-->
        <div class="Recommendation bdr">
            <div class="ico Rec indent">推荐</div>
            <div class="hd"><b class="Net-mark">债权转让</b>投资转让项目获得更短的期限、更高的收益率</div>

            <div class="bd clearfix">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
                    <div class="txt fl">
                        <h2>珍珠商贸公司商户进货<em class="ico">奖</em></h2>
                        <h5>借款担保方-合肥燕莎服饰公司</h5>
                        <div class="title mt40 clearfix"><span class="fr">投资期限</span>预期年化</div>
                        <div class="con mt10 clearfix"><span class="fr">6个月</span><span class="o">12.8<span class="f18">%</span></span>
                        </div>
                    </div>
                    <div class="progress fl">
                        <div class="ui-progressbar-mid" style="background:url(./PUblic/Home/images/50.png) no-repeat center;">50%
                        </div>
                        <a href="invest-list.html" class="ico btn-Tender">投标</a>
                        剩余金额 250,000元
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>

        <!--信用标-->
        <div class="Recommendation mt10 bdr">
            <div class="hd clearfix"><a href="#" class="more">更多&gt;&gt;</a><b class="Net-mark">信用标</b>按月付息
                到期还本；1000元起投；工作日<b class="f14 o">10:30、14:30、17:30、20:00</b> 更新，周末与其余时间随机
            </div>
            <dl>
                <dt class="clearfix"><a href="#" class="button ico Repayment">还款中</a><em class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:100%"></span></span>100%
                </dd>
            </dl>
            <dl>
                <dt class="clearfix"><a href="invest-list.html" class="button ico Bid">投标</a><em
                        class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:75%"></span></span>75%
                </dd>
            </dl>
            <dl>
                <dt class="clearfix"><a href="invest-list.html" class="button ico Bid">投标</a><em
                        class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:75%"></span></span>75%
                </dd>
            </dl>
        </div>

        <!--债权转让-->
        <div class="Recommendation mt10 bdr">
            <div class="hd clearfix"><a href="#" class="more">更多&gt;&gt;</a><b class="Net-mark">净值标</b>灵活投资，每月返还本息；50元起投；工作日<b
                    class="f14 o">10:30、14:30、17:30、20:00</b> 更新，周末与其余时间随机
            </div>
            <dl>
                <dt class="clearfix"><a href="#" class="button ico Repayment">还款中</a><em class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:100%"></span></span>100%
                </dd>
            </dl>
            <dl>
                <dt class="clearfix"><a href="invest-list.html" class="button ico Bid">投标</a><em
                        class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:75%"></span></span>75%
                </dd>
            </dl>
            <dl>
                <dt class="clearfix"><a href="invest-list.html" class="button ico Bid">投标</a><em
                        class="ico Guarantee">保</em>园博印象旅游珠宝商户进货<span
                        class="Guarantee-Agency">  担保机构：安徽融桥担保股份有限公司</span></dt>
                <dd>
                    <span class="APR-loan">借款年利率  <b class="o">10%</b> </span><span class="time">期限  90天</span><span
                        class="Investment-Amount">投资金额  25,000.00元 </span>进度<span class="process"><span
                        class="process-bar" style="width:75%"></span></span>75%
                </dd>
            </dl>
        </div>

    </div>

    <div class="indexaside fr">
        <!--video-->
        <!--<div class="video"><iframe height=227 width=100% src="http://player.youku.com/embed/XODY1NjI0Mjc2" frameborder=0 allowfullscreen></iframe></div>-->

        <div class="mt10 bd bdr">
            <!--Notice-->
            <div class="hd clearfix"><a href="<?php echo U('index');?>" class="more">更多&gt;&gt;</a>网站公告</div>
            <ul class="Notice cicle clearfix">
                <?php if(is_array($row)): foreach($row as $key=>$vo): ?><li><span class="time"><?php echo ($vo["time"]); ?></span><a href="newshow.html"><?php echo ($vo["content"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
            <!-- reports-->
            <div class="hd mt10 clearfix"><a href="reports.html" class="more">更多&gt;&gt;</a>媒体报道</div>
            <div class="reports mt10 clearfix">
                <dl class="clearfix">
                    <dt class="img"><a href="reportshow.html"><img src="/Public/Home/upload/img5.jpg"></a></dt>
                    <dd><a href="newshow.html">互联网金融应该充当毛细血管的角色-上海法治声音</a></dd>
                </dl>
                <dl class="clearfix">
                    <dt class="img"><a href="reportshow.html"><img src="/Public/Home/upload/img6.jpg"></a></dt>
                    <dd><a href="newshow.html">互联网金融应该充当毛细血管的角色-上海法治声音</a></dd>
                </dl>
            </div>

        </div>

        <!--ad-->
        <div class="ad img mt10"><a href="#" class="btn-reg"><img src="/Public/Home/upload/img7.jpg"></a></div>

        <!--about-->
        <div class="mt10 bd bdr">
            <div class="hd clearfix"><a href="about.html" class="more">更多&gt;&gt;</a>关于我们</div>
            <div class="txt clearfix">
                　　万国集团成立于2009年，是专业从事商业地产开发、运营、管理及小额贷款等融资投资机构，由占安徽服饰市场三分天下的众多实力品牌省级代理商联合打造。自成立以来，始终秉承“全力塑造优质地产品牌，全心服务社会建设目标”的商业宗旨，致力于推进安徽服装商业地产的全面升级。
            </div>
        </div>

        <!--Billboard-->
        <div class="mt10 bd bdr">
            <div class="hd clearfix">理财风云榜</div>
            <table class="Billboard-tab">

                <tr>
                    <th width="40">排名</th>
                    <th width="60">用户名</th>
                    <th width="105">个人金额</th>
                    <th class="tr">排名变化</th>
                </tr>
             
                <tr>
                    <td><span class="ico three">1</span></td>
                    <td><?php echo ($user["pname"]); ?></td>
                    <td class="o">&yen;12,124,356,565.12</td>
                    <td class="tc">-</td>
                </tr>
                <tr>
                    <td><span class="ico three">2</span></td>
                    <td><?php echo ($user["pname"]); ?></td>
                    <td class="o">&yen;12,124,356,565.12</td>
                    <td class="tc">-</td>
                </tr>
                <tr>
                    <td><span class="ico three">3</span></td>
                    <td><?php echo ($user["pname"]); ?></td>
                    <td class="o">&yen;12,124,356,565.12</td>
                    <td class="tc">-</td>
                </tr>
              
            </table>
        </div>

    </div>
</div>

<script src="/Public/Home/js/Action.js"></script>
<script src="/Public/Home/js/waste.js"></script>
<script src="/Public/Home/js/banner.js"></script>
<script src="/Public/Home/js/jQuery-jcMarquee.js"></script>
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
            <a href="about.html">关于我们</a> |
            <a href="<?php echo U('Admin/Officia/test2');?>">网站公告</a> |
            <a href="reports.html">媒体报道</a> |
            <a href="partners.html">合作伙伴</a> |
            <a href="#">安全保障</a> | <a href="#">本金保障</a> | 
            <a href="#">帮助中心</a> | <a
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

<script>
/*    $(function () {
        $('#Marquee_x').jcMarquee({'marquee': 'x', 'margin_right': '10px', 'speed': 20});
        $(".loginbtn").click(function () {
            $(".Pop-up").show();
            $(".pop-bd").slideDown(500);
            $("#form2").hide().siblings("#form1").show();
        });
        $(".regbtn").click(function () {
            $(".Pop-up").show();
            $(".pop-bd").slideDown(500);
            $("#form1").hide().siblings("#form2").show();
        });
        $("#btnreg").click(function () {
            $(this).parents("#form1").hide().siblings("#form2").show();
        })
        $("#btnlogin").click(function () {
            $(this).parents("#form2").hide().siblings("#form1").show();
        })
        $(".close").click(function () {
            $(this).parents(".Pop-up").hide().find(".pop-bd").hide()
        });

        $(".form .form-control").each(function () {
            var thisVal = $(this).val();
            if (thisVal != "") {
                $(this).siblings("span").hide();
            }
            else {
                $(this).siblings("span").show();
            }
            $(this).focus(function () {
                $(this).siblings("span").hide().parents("label").css("z-index", "10009").siblings("label").css("z-index", "10008");
            }).blur(function () {
                var val = $(this).val();
                if (val != "") {
                    $(this).siblings("span").hide().siblings("label").css("z-index", "10008");
                }
                else {
                    $(this).siblings("span").show().siblings("label").css("z-index", "10008");
                }
            });
        });
    });*/
</script>
<script>
    //弹出一个iframe层
//    $('#loginbtn').on('click', function(){
//        layer.open({
//            type: 2,
//            title: '登录',
//            maxmin: true,
//            // shadeClose: false, //点击遮罩关闭层
//            shade: 0,
//            area : ['300px' , '200px'],
//            content: "<?php echo U('Index/login');?>"
//        });
//    });
//    $('#register').click(function(){
//
//    });

 /*   $('input[type=button]').click(function(){
        alert(2);})
*/
</script>
</body>
</html>