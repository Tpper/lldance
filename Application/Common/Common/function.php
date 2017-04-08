<?php
//邮件发送测试方法
function sendMail($subject,$msghtml,$sendAddress){
    //引入发送类phpmailer.php
    import('Vendor.PHPMailer.PHPMailer');
    //实列化对象
    $mail             = new \PHPMailer();
    /*服务器相关信息*/
    $mail->IsSMTP();                        //设置使用SMTP服务器发送
    $mail->SMTPAuth   = true;              //开启SMTP认证
    $mail->Host       = 'smtp.163.com';         //设置 SMTP 服务器,自己注册邮箱服务器地址
    $mail->Username   = 'tanpper';      //发信人的邮箱用户名
    $mail->Password   = 't920627'; //新注册邮箱，客户端授权码
    /*内容信息*/
    $mail->IsHTML(true);               //指定邮件内容格式为：html
    $mail->CharSet    ="UTF-8";          //编码
    $mail->From       = 'tanpper@163.com';       //发件人完整的邮箱名称
    $mail->FromName   ="tanpper";      //发信人署名
    $mail->Subject    = $subject;         //信的标题
    $mail->MsgHTML($msghtml);           //发信主体内容
    // $mail->AddAttachment("fish.jpg");      //附件
    /*发送邮件*/
    $mail->AddAddress($sendAddress);        //收件人地址
    //使用send函数进行发送
    if($mail->Send()) {
        //发送成功返回真
        return true;
        // echo '您的邮件已经发送成功！！！';
    } else {
        return  $mail->ErrorInfo;//如果发送失败，则返回错误提示
    }
}
function sendTemplateSMS($to, $datas, $tempId)
{
    import('Vendor.sms.Rest');
    // 初始化REST SDK
    // global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    //主帐号,对应开官网发者主账号下的 ACCOUNT SID
    $accountSid= '8a216da85b3c225d015b3dfeeca601b3';
    //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
    $accountToken= '58bd75d13b7e4e7e9f1a3064b5d8aebc';
    //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
    //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
    $appId='8a216da85b3c225d015b3dfeed1601b7';
    //请求地址
    //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
    //生产环境（用户应用上线使用）：app.cloopen.com
    $serverIP='sandboxapp.cloopen.com';
    //请求端口，生产环境和沙盒环境一致
    $serverPort='8883';
    //REST版本号，在官网文档REST介绍中获得。
    $softVersion='2013-12-26';
    //实列化REST对象
    //设置相关参数
    $rest = new \Rest($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);

    // 发送模板短信
    // echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        return false;
    }
    if($result->statusCode!=0) {
        return false;
        //TODO 添加错误处理逻辑
    }else{
        echo "Sendind TemplateSMS success!<br/>";
        // 获取返回信息
        return true;
        //TODO 添加成功处理逻辑
    }
}


?>