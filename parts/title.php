<!-- in case jquery is not loaded in head -->
<script type="text/javascript" src="/libs/jquery/jquery-3.4.1.js"></script>
<script>
    $(function(){
    
        console.log("jquery ready");

    });
</script>

<div class="row clearfix">
            <div class="col-md-12 column">
                <div class="page-header">
                    <h1 style="margin-left:50px;">
                        青苔的博客 <small>才能のない者だ</small>
                    </h1>
                </div>
                <nav class="navbar navbar-default navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle
                                navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button> <a class="navbar-brand" href="/">首页</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                        <?php 
                            function highlightBar($loc){
                                if(isset($_GET["location"]) && ($_GET["location"]==$loc))
                                    {echo "class=\"active\"";} 
                            }
                            ?>
                            <li <?php highlightBar("essay"); ?>>
                                <a href="/html/essay.php?location=essay">随笔</a>
                            </li>
                            <li <?php highlightBar("bookNotes"); ?>>
                                <a href="/html/bookNotes.php?location=bookNotes">读书笔记</a>
                            </li>
                            <li <?php highlightBar("science"); ?>>
                                <a href="/html/science.php?location=science">科学&技术</a>
                            </li>
                            <li <?php highlightBar("lab"); ?>>
                            <a href="javascript:void(0)" onclick="popMsg('施工中...');">实验室</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">编程<strong
                                        class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">PHP</a>
                                    </li>
                                    <li>
                                        <a href="#">PYTHON</a>
                                    </li>
                                    <li>
                                        <a href="#">MYSQL</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">算法</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">这部分都在施工中。。</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search" action="/html/search.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="kwd" value="<?php if(isset($_POST["kwd"])){echo $_POST["kwd"];}else{echo "";}?>"/>
                            </div> <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                        <ul id="userPanel" class="nav navbar-nav navbar-right">
                            <li>
                            <?php if(empty($_SESSION['login'])): ?>
                            <a href="/views/login.php">登录</a>
                            <?php elseif($_SESSION['login'] == "1"): ?>

                                <?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='19'): ?>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nkname']; ?><strong
                                            class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/admin/setting.php">管理</a>
                                        </li>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a id="log-out">退出</a>
                                        </li>
                                    </ul>
                                <?php else: ?>
                                    <a href="/"><?php echo $_SESSION['nkname']; ?></a>
                                <?php endif; ?>

                            <?php endif; ?>

                            </li>
                        </ul>
                        <script>
                            $("#log-out").click(function() {
                                    $.ajax({
                                        type: "GET",
                                        cache:false,
                                        processData:false, //将data解析为字符串
                                        url: "/html/logOut.php", //提交处理
                                        contentType: "application/x-www-form-urlencoded; charset=utf-8",     
                                        success: function(result) {
                                            popMsg('已登出');
                                            $("#userPanel").html(result);
                                        },
                                        error: function(result) {
                                            alert("failed");
                                        }
                                    })
                            });
                        </script>
                    </div>

                </nav>
            </div>
        </div>