<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-25 18:02:41
  from '/var/www/qingtaiss/templates/test.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e54f0c16f2984_46342264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18320ba62cda1c373187b2cf4aae973e33d7c581' => 
    array (
      0 => '/var/www/qingtaiss/templates/test.html',
      1 => 1582623953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e54f0c16f2984_46342264 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!DOCTYPE html>

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
        
        <?php echo $_smarty_tpl->tpl_vars['test']->value;?>

        <div id="login">
            <a href="../views/login.html"><span>登录</span></a>
        </div>
        <a href="../views/authCode.php">验证码</a>
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
<?php }
}
