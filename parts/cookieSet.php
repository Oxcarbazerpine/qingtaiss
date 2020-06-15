<?php   
$expire = time()+1*60*60*24*7;//expire in a week
$domainName = 'qingtai33.cn';
$path = '/';
//set username cookie
$unameAfter = base64_encode($username);
setcookie("GIVEMENAME", $unameAfter, $expire, $path, $domainName );  

//set password cookie
$genNum =  rand(10,99); // generate a random number
$pwdAfter = base64_encode($passwordMD5.strval($genNum));  //conver to string
setcookie("MANNEVERFAIL", $pwdAfter, $expire, $path, $domainName );

//set rand number cookie
// $bias = 88;
// setcookie("MYSTERIOUS", $genNum+$bias, $expire);
?>