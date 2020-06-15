<?php
	// this file should be included at the very top
	
	//开启Session
	session_start();
	/*定义根目录绝对路径*/
	define('ROOT',dirname(__FILE__));
	/*包含数据库连接类这个文件*/
	include_once(ROOT."/method/db.class.php");
	/*生成一个db的对象*/
	$db = new db();
   

 	/*读取后台管理员的系统配置即每页的显示博客数量、博客标题等信息*/
 	$sql="select * from config";
	$set_result=$db->query($sql);
	$setting=array();
	while($row=$set_result->fetch_array()){
		$setting[$row['name']]=$row['ctnt'];
	}

?>