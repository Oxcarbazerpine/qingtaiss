<!DOCTYPE html>
<?php 
echo "hello";  
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>青苔的个人博客</title>
        
        <link rel="stylesheet" type="text/css" href="../static/css/homePage.css">
        <!-- <link rel="stylesheet" href="../static/css/homePage.css"> -->
    </head>
    <body>
        <header>
        
            <br>
            <h2 id="blogName">青苔的博客</h2>
        </header>
        <aside id="sidebar">
            <ul>
                <li><a class="sbar" href="/">主页</a></li>
                <li><a class="sbar" href="/">文章</a></li>
                <li><a class="sbar" href="/">待定</a></li>
                <li><a class="sbar" href="/">关于</a></li>
                </ul>
        </aside>
        
        {$test}
        <div id="login">
            <a href="../views/login.php"><span>登录</span></a>
        </div>
        <a href="../views/authCode.php">验证码</a>
        <a href="../views/info.php">info.php</a>
        <a href="../templates/test.php">self</a>
        <a href="../index.php">index.php</a>
        <a href="../views/logInfo.php">logInfo</a>
        <div id="articles">
            <h1 title="block-title">文章列表</h1>
            <div class="article-block">
                <a class="article-container" href="../articles/firstArticle.html">
                    <span class='article-title'>我的第一篇文章</span>
                </a>
            </div>
                
            
        </div>
        <p id="endText" style="border:2px; color:green">Give me thumbs up!</p>
        <footer>
            All rights belongs to qingtaiss
            <br>
            Smile
        </footer>
    </body>
</html>
