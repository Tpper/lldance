<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>

</head>
<body>
<form action="" method="post">
    <p>账号：<input type="text" name="name"></p>
    <p>密码：<input type="password" name="password" ></p>
    <input type="button" value="登录" id="sub" >
    <div id="show"></div>
</form>
<script>
    function clear(){
        $('#sub').removeAttr('disabled');
    }
    $('#sub').click(function(){
        var name = $('input[name=name]').val();
        var password = $('input[name=password]').val();
        var index = parent.layer.getFrameIndex(window.name);
        $.ajax({
            type:'post',
            url:"<?php echo U('Login/index');?>",
            data:"name="+name+"&password="+password,
            dataType:'json',
            success:function(e){
                //alert (1);die;
                console.log(e);
                if(e[0]==0||e[0]==2){
                    if(e[0]==2){
                        $('#sub').attr('disabled','disabled');
                        setTimeout("clear()",10000);
                    }
                    $('#show').text(e[1]);

                }else{

                    parent.layer.close(index);
                    $('span.fr',parent.document).html("<a class='loginbtn'>"+name+"</a><a href='javascript:;' class='o regbtn'>退出</a> <a href='<?php echo U('Member/member');?>'>个人中心</a>");

                }
            }
        })
    });

</script>
</body>
</html>