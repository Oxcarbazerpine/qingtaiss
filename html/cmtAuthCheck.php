<?php
session_start();

$code = $_POST["code"]; //验证码
if(strtolower($code) == strtolower($_SESSION['authcode'])) //判断填写的验证码是否与验证码PHP文件生成的信息匹配
{
    echo '1';
}else{
    echo '0';
}
?>