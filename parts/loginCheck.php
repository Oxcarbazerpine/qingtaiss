<?php
if(empty($_SESSION['login'])){
    //没有登陆的话.....
    $loginStatus= '<a href="/views/login.php">登录</a>';
    }else{
    //已经登陆了..
    $loginStatus = '<a href="/">'.$_SESSION['nkname'].'</a>';
    }

if(isset($_SESSION['uid']) && $_SESSION['uid']=='19'){ //认证管理员身份
        
    //已经登陆了.
    $_SESSION['admin'] = "on";
    $loginStatus = '<a href="/admin/setting.php">'.$_SESSION['nkname'].'</a>';
    //点击名字链接到管理页面
    }
    ?>