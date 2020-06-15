<?php
//require loading config file first!

//login check first
if(empty($_SESSION['login'])){
    // have not log in, proceed

    if(isset($_COOKIE["GIVEMENAME"])){
        //if cookie is set, proceed

            //read and decode cookie
                //username
            $username = base64_decode($_COOKIE["GIVEMENAME"]);
                //password
            $pwdBefore = base64_decode($_COOKIE["MANNEVERFAIL"]);
            $len = strlen($pwdBefore);
            $passwordMD5 = substr($pwdBefore , 0, $len-2); //trim the last two digit


            //send data to database and login
            $sql = "select * from login where username='$username'";
            $result = $db->query($sql);
            $rows = mysqli_fetch_array($result);
            //set session data
            //比对数据库数据
            if($rows) {
                //拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
                if ($username == $rows["username"] && $passwordMD5 == $rows["passwordMD5"]) {
                    //echo "验证成功！<br>";
                    $_SESSION['login']= "1";
                    $_SESSION['uid']= $rows["id"];
                    $_SESSION['nkname']= $rows["nickname"];
                    echo "<script type='text/javascript'>console.log('登陆成功')</script>";
                } else {
                    echo "<script type='text/javascript'>console.log('用户名或者密码错误')</script>";
                }
            }
            else{
                echo "<script type='text/javascript'>console.log('查询错误：用户名或密码错误')</script>";
            }
        }
}
?>