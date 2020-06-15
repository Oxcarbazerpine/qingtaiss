<?php
        include '../config.php';

        //记录之前用户所在页面
        $_SESSION['lastLoc']=$_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php
        include_once(ROOT."/parts/head.php");
    ?>
    <link rel="stylesheet" type="text/css" href="/static/css/login.css">
    <script src="https://cdn.bootcss.com/blueimp-md5/2.12.0/js/md5.min.js"></script>
</head>
<body>

    <div class="container">
        <?php
            include_once(ROOT."/parts/title.php");
        ?>

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                    <h2 style="text-align: center;">用户登录</h2>

                    <form id="login-form" class="form-inline" role="form">
                        <ul>

                            <li>
                                <div class="form-group">
                                    <label>账号：</label>
                                    <input type="text" class="form-control" name="username" placeholder="请输入账号"
                                        value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>" />

                                </div>
                            </li>


                            <li>
                                <div class="form-group">
                                    <label>密 码：</label>

                                    <input type="password" class="form-control" id="pwd" placeholder="请输入密码" />
                                    <input type="hidden" name="password" id="md5" />
                                    
                                </div>
                            </li>


                            <li>
                                <div class="form-group">
                                    <label>验证码：</label>
                                    <input type="text" class="form-control" name="code" size="4" style="float:left; width:auto;"
                                        placeholder="验证码" />
                                    <a href="javascript:;"
                                        onclick="document.getElementById('captcha_img').src='authCode.php?r='+Math.random()">
                                        <img id="captcha_img" border='1' src='authCode.php'
                                            style="display: inline-block; width:100px; height:30px" />
                                    </a>
                                </div>
                            </li>

                            <li>
                                <button type='button' id="submitButton" class="button button-pill button-border">提交</button>
                                <a href="register.php"><button type='button' class="button button-pill button-border" style="margin-left:20px;">注册新账号</button</a>
                            </li>

                        </ul>
                    </form>
                    <!-- 将密码加密处理 -->
                    <script>
                    function transCode() {
                        var pwd = document.getElementById('pwd');
                        var pwdMD5 = document.getElementById('md5');
                        pwdMD5.value = md5(pwd.value);
                        return true;
                    }
                    </script>
                    <!-- jquery ajax异步提交表单 -->
                    <script>
                        //若利用button的submit的type提交：$("#cmtSubmit").submit(function() {
                            $("#submitButton").click(function() {
                                    transCode(); //加密密码
                                    var sendLoc = "/views/loginSubmit.php";
                                    var formData = $("#login-form").serialize();
                                    var func = function(result){
                                        if(result === "登陆成功"){
                                            setTimeout(function(){
                                                window.history.go(-1); //返回上一页
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