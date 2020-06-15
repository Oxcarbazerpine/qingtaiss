<?php
  include '../config.php';
  //设置session生命周期
  // session_set_cookie_params(60*60*4);
  // session_cache_expire(60*60*4);

header("Content-type:text/html;charset=utf-8");

 //连接数据库取得数据

//取得登录数据
$username = $db->escape($_POST['username']);  //调用db的escape方法转义用户名
$passwordMD5 = $db->escape($_POST["password"]);  //转义密码
$code = $_POST["code"]; //验证码

//验证用户输入
if($username == "")
{
  echo '请填写用户名';
  exit;
}
if($passwordMD5 == "")
{
  echo '请填写密码';
  exit;
}
if(strtolower($code) != strtolower($_SESSION['authcode'])) //判断填写的验证码是否与验证码PHP文件生成的信息匹配
    {
     echo '验证码错误';
     exit;
    }


$sql = "select * from login where username='$username'";
$result = $db->query($sql);
//mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);

//比对数据库数据
if($rows) {
    //拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
      if ($username == $rows["username"] && $passwordMD5 == $rows["passwordMD5"]) {
        //echo "验证成功！<br>";
        $_SESSION['login']= "1";
        $_SESSION['uid']= $rows["id"];
        $_SESSION['nkname']= $rows["nickname"];
        echo '登陆成功';    //location='".$_SESSION['lastLoc']."';</script>";
      } else {
        echo "用户名或者密码错误";
        //echo "<script type='text/javascript'>alert('用户名或者密码错误');location='login.php';</script>";
        //echo "<a href='login.php'>返回</a>";
      }
  }
  else{
    echo '查询错误：用户名或密码错误';
  }

  $db->close();
//mysqli_close($link); //关闭连接
?>
<?php
    include_once(ROOT."/parts/cookieSet.php");
?>