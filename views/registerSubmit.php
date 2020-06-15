<?php
  include '../config.php';
  header("Content-type:text/html;charset=utf-8");
 
  $nickname = $db->escape($_POST['nickname']);
  $username = $db->escape($_POST['username']);
  $password = $db->escape($_POST['password']);
  $confirm = $db->escape($_POST['confirm']);
  $email = $db->escape($_POST['email']);
  $code = $_POST['code'];
  
  if($username == "" || $password == "" || $confirm == "" || $email == "" || $code == "")
  {
    echo '信息不能为空！重新填写';
    exit;
  } elseif ($nickname == "") {
    $nickname = $username;//设置昵称默认为用户名
    //判断用户名长度
  }elseif ((strlen($username) < 4)||(!preg_match('/^\w+$/i', $username))) {
    echo '用户名至少4位且不含非法字符，请重新填写';
    exit;
    //判断用户名长度
  }elseif(strlen($password) < 5){
      echo '密码至少5位，请重新填写';
      exit;
      //判断密码长度
  }elseif($password != $confirm) {
      echo '两次密码不相同，请重新填写';
      exit;
      //检测两次输入密码是否相同
  } elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
      echo '邮箱格式错误，请重新填写';
      exit;
      //判断邮箱格式是否合法
  } elseif(strtolower($code) != strtolower($_SESSION['authcode'])) {
    echo '验证码错误，请重新填写';
    exit;
    //判断验证码是否填写正确
  } elseif(mysqli_fetch_array( $db->query("select * from login where username = '$username'"))){
    echo '用户名已存在';
    exit;
  } 

  //confirmation complete
  $passwordMD5 = md5($password); //转为md5,同时传输原密码，为用户找回密码做准备，或者直接重置
  $sql= "insert into login(username, nickname, passwordMD5, email, registerDate)values('$username','$nickname','$passwordMD5','$email',NOW())";
  //插入数据库
  if(!( $db->query($sql))){ //返回 SELECT 语句得到的行数，根据其是否等于 0 进行判断
    echo '数据插入失败';
  }else{
    $_SESSION['username']=$username; //pass to login form
    echo '注册成功';
  }
  

  $db->close();
  //mysqli_close($link); //关闭连接
?>