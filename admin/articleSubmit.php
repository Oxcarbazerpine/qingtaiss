
<?php
  include '../config.php';
	header("Content-type:text/html;charset=utf-8");


 //取得数据
$aid = htmlspecialchars($_GET["aid"]);
$title = $_POST["title"];
$content = $_POST["content"];
$class = $_POST["class"];

//插入数据
if($title== "" )
{
  echo '请输入标题';
  exit;
}
if($aid){
    $sql = "update articles set title='$title', alterDate= NOW(), author='青苔', class='$class', content='$content' where aid='$aid'";
}else{
  //否则新建文章
  //$sql = "set names 'utf8';";
  //$sql .= "insert into articles(title,author,content)values('$title','青苔','$content');";
  $sql = "insert into articles(title,author,class,content)values('$title','青苔','$class','$content');";
}
    
//验证和反馈
if (!($db->query($sql))){//(!(mysqli_multi_query($link,$sql))){ //返回 SELECT 语句得到的行数，根据其是否等于 0 进行判断
    echo '数据插入失败';
  }else{
    echo "提交成功";
  }

$db->close();
?>