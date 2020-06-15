<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1 initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <title>青苔的个人博客</title>

    <link rel="stylesheet" type="text/css" href="./libs/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/homeApply.css">
</head>

<body>
    <header>

        <br>
        <h2 id="blogName">青苔的博客</h2>
    </header>

    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">主页</a></li>
                    <li><a href="#about">文章</a></li>
                    <li><a href="#contact">其他</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    {$test}

    <div id="login">
        <a href="./views/login.php"><span>登录</span></a>
    </div>
    <a href="./views/authCode.php">验证码</a>
    <a href="./views/info.php">info.php</a>
    <a href="./index.php">index.php</a>
    <a href="./admin/article.php">article</a>


 
    <div class="jumbotron">
        <h3>文章列表</h3>

        <?php foreach ($blogs as $blog): ?>
        <div class="col-md-9">
            <a class="article-container" href="./html/artView.php?aid=<?php echo $blog['aid']; ?>">
                <span class='article-title'><?php echo $blog['title']; ?></span>
            </a>
        </div>
        <?php endforeach;?>

    </div>



    <p id="endText" style="border:2px; color:green">Give me thumbs up!</p>
    <footer>
        All rights belongs to qingtaiss
        <br>
        email: fengtrss@qq.com
        Smile
    </footer>
    <!--加载bootstrap js-->
    <script src="./libs/jquery/jquery-3.4.1.js"></script>
    <script src="./libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>

</html>