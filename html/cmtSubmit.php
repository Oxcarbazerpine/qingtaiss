<?php
  include '../config.php';
	header("Content-type:text/html;charset=utf-8");


 //取得数据
$content = $_POST["cmtContent"];
$uid = $_SESSION['uid'];
$aid = $_SESSION['aid'];

//插入数据
if($content== "" )
{
  echo "请输入内容";
  exit;//退出当前脚本
}
    //$sql = "set names 'utf8';";
    //$sql .= "insert into articles(title,author,content)values('$title','青苔','$content');";
    $sql = "insert into comment(uid,aid,content)values('$uid','$aid','$content')";
//验证和反馈
if (!($db->query($sql))){       //面向过程写法：(!(mysqli_multi_query($link,$sql))){ //返回 SELECT 语句得到的行数，根据其是否等于 0 进行判断
    echo "提交失败";        //"<script>alert('数据插入失败');window.history.back(-1);</script>";
  }else{
    echo "提交成功";        //"<script>alert('提交成功！');window.history.back(-1);</script>";
  }

$db->close();
?>