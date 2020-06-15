<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php
        include_once("../parts/head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../static/css/register.css">

</head>

<body>


    <div class="container">
        <?php
            include_once("../parts/title.php");
        ?>

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                <h2 style="text-align: center;">用户注册</h2>
                    <form id="register-form" class="register-form form-inline" role="form">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <label >昵称：</label>
                                    <input type="text" class="form-control" name="nickname" placeholder="请输入昵称"
                                        value="<?php if (!empty($nickname)) echo $nickname; ?>" />
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label >账号：</label>
                                    <input type="text" class="form-control" name="username" placeholder="请输入注册账号"
                                        value="<?php if (!empty($username)) echo $username; ?>" />
                                        <span class="help-block">最少4位英文或数字</span>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label>密 码：</label>
                                    <input type="password" class="form-control" name="password" placeholder="请输入密码" />
                                    <span class="help-block">最少5位</span>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label>确认密码：</label>
                                    <input type="password" class="form-control" name="confirm" placeholder="请再次输入密码" />
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label>邮 箱：</label>
                                    <input type="text" class="form-control" name="email" placeholder="请输入邮箱"
                                        value="<?php if (!empty($email)) echo $email; ?>" />
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label>验证码：</label>
                                    <input type="text" class="form-control" name="code" size="4" 
                                        placeholder="请填写验证码" style="width: 120px"/>
                                    <a href="javascript:;"
                                        onclick="document.getElementById('captcha_img').src='authCode.php?r='+Math.random()">
                                        <img id="captcha_img" border='1' src='authCode.php?r=echo rand(); ?>'
                                            style="width:100px; height:30px" />
                                    </a>
                                </div>
                            </li>
                            <li>
                            <button type='button' id="submitButton" class="button button-pill button-border">注册</button>
                            </li>
                        </ul>
                    </form>
                                        <!-- jquery ajax异步提交表单 -->
                            <script>
                            $("#submitButton").click(function() {
                                    var sendLoc = "/views/registerSubmit.php";
                                    var formData = $("#register-form").serialize();
                                    var func = function(result){
                                        if(result === "注册成功"){
                                            setTimeout(function(){
                                                window.history.back();//返回上一页}
                                            },1200);
                                        }
                                    };  
                                    ajaxSubmit(sendLoc,formData,func,1);
                        })
                        </script>
                </div>
            </div>
        </div>
    </div>
    <!--加载js-->
    <script type="text/javascript" src="/static/js/appendScript.js"></script>
    <script>appendScript(jsFiles,"off");</script>
</body>

</html>