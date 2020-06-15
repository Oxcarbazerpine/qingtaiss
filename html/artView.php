<?php
    include '../config.php';
    include_once(ROOT."/parts/cookieEat.php");
    include_once(ROOT."/parts/loginCheck.php");
?>
<?php //加载文章评论

    $aid = htmlspecialchars($_GET["aid"]);
    $sql = "select * from comment where aid='$aid' order by createdDate desc";
    $result = $db->query($sql);
    $comments = array();
    while ($row = $result->fetch_array()) {
        $comments[] = $row;
    }

    //增加浏览量计数
    $sql = "Update articles set views = views+1 where aid='$aid'";
    $result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php
        include_once(ROOT."/parts/head.php");
    ?>

</head>

<body>


    <div class="container">
        <?php
            include_once(ROOT."/parts/title.php");
        ?>

        <div class="row clearfix">
            <?php
                 include_once(ROOT."/parts/leftCol.php"); //column2
            ?>
            <div class="col-md-9 column">
                <div class="col-md-12 column">
                    <div class="jumbotron">
                        <!-- 文章主体 -->
                        <?php

                        $aid = htmlspecialchars($_GET["aid"]);
                        $sql = "select * from articles where aid='$aid'";
                        $result = $db->query($sql);
                        $atc = $result->fetch_array(); //save all information in atc
                        //文章标题
                        echo "<h2 style='text-align:center; margin:30px 30px 80px 30px;'>".$atc['title']."</h2>";
                        //文章内容
                        echo $atc['content'];
                    ?>
                        <div>
                            <small>最后编辑于：<?php echo $atc['alterDate']; ?></small>
                        </div>
                        <div>
                            <small>&#12288&#12288创建于：<?php echo $atc['createdDate']; ?></small>
                        </div>
                    </div>

                </div>
                <!--评论区 -->
                <div class="col-md-12 column">
                    <div>
                        <!-- 编辑区 -->
                        <?php $_SESSION['aid']=$aid; ?>
                        <form role="form" id="cmtSubmit">
                            <div class="form-group">  
                                <label for="name">编辑评论</label>
                                <?php if(empty($_SESSION['login'])): ?>

                                （请先<strong><a href="/views/login.php" style="text-decoration:underline;">登录</a></strong>）

                                <?php endif; ?>
                                <textarea id="cmtText" type="text" name="cmtContent" class="form-control" rows="3"
                                    cols="6" required></textarea>
                            </div>
                            <button type='button' id="submitButton" class="btn btn-default">提交</button>
                        </form>
                        <script>
                            //定义评论计数器
                            var cmtCount = 0;                          

                            $("#submitButton").click(function() {
                                if ( <?php echo $_SESSION['login'] ? 1 : 0; ?> ) { //若已登录允许提交
                                    var sendLoc = "/html/cmtSubmit.php";
                                    var formData = $("#cmtSubmit").serialize();
                                    var func = function(result){
                                        if(result === "提交成功"){
                                            setTimeout(function(){
                                                //ajaxly refresh comments
                                                var refreshLoc = "/html/cmtRefresh.php?aid=<?php echo $aid; ?>"; //提交处理
                                                var refresh = function(result){
                                                    $("#comment-container").html(result);
                                                }
                                                ajaxSubmit(refreshLoc,null,refresh);
                                            },1500);
                                        }
                                    }; 
                                    // var cmtCount = 0;
                                    cmtCount++;
                                    //提交计数，防止恶意提交
                                    console.log(cmtCount);
                                    if(cmtCount>3){
                                        //弹出验证码
                                        $('#authBox')
                                        .css("display","block");//隐藏div

                                       
                                    }else{
                                        ajaxSubmit(sendLoc,formData,func,1);
                                    }
                                } 
                                else //否则跳到登录界面
                                {
                                    popMsg('请先登录再评论');
                                    setTimeout(function(){
                                        window.location.href = '/views/login.php';//跳到登录页面
                                            },2000);
                                    
                                }
                        })
                        </script>
                    </div>
                    <div id="authBox" class = "alert alert-success" style="display: none;">
                        <div>
                        <label>验证码：</label>
                        <span>
                        <a href="javascript:;"
                            onclick="document.getElementById('captcha_img').src='/views/authCode.php?r='+Math.random()">
                            <img id="captcha_img" border='1' src='/views/authCode.php' style="display: inline-block; width:100px; height:30px" />
                        </a>
                        </span>
                        </div>
                        <div style="margin:20px;">
                        <label>请输入验证码：</label>
                        <span><input id="authInput" type="text" class="form-control" name="code" size="4" style="display: inline-block; width:auto;"
                            placeholder="验证码" />
                        </span>
                        </div>

                        <div>
                        <button type='button' id="cmtCheck" class="button button-pill button-border" style="margin:20px;">提交</button>
                        </div>
                        <script>
                            $('#cmtCheck').click(function(){
                                    var loc = "/html/cmtAuthCheck.php";
                                    var data = $('#authInput').serialize();
                                    var func = function(result){
                                        if(result == "1"){
                                            $('#authBox').hide();
                                            cmtCount = 0; //归零
                                            $("#submitButton").click();
                                        }else if(result == "0"){
                                            popMsg("验证码错误");
                                        }else{
                                            popMsg("其他错误");
                                        }
                                    }
                                    ajaxSubmit(loc,data,func);
                          
                            });
                        </script>
                    </div>
                    <div class="line-divider" style="margin:20px; height:2px;"></div>
                    <!--评论浏览区 -->
                    <div id="comment-container">
                        <?php include_once(ROOT."/parts/loadComment.php"); ?>
                    </div>

                </div>
            </div>
            <?php
                include_once(ROOT."/parts/rightNav.php"); //column1
            ?>
        </div>
        <?php
            include_once(ROOT."/parts/bottom.php");
        ?>
    </div>
    <!--加载js-->
    <script type="text/javascript" src="/static/js/appendScript.js"></script>
    <script>appendScript(jsFiles,"off");</script>
</body>

</html>