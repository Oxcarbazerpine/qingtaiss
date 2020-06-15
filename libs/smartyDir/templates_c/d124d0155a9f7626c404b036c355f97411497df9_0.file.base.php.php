<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-01 16:07:07
  from '/var/www/qingtaiss/smartyDir/templates/base.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5b6d2be25bb9_95545501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd124d0155a9f7626c404b036c355f97411497df9' => 
    array (
      0 => '/var/www/qingtaiss/smartyDir/templates/base.php',
      1 => 1583050014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5b6d2be25bb9_95545501 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <?php echo $_smarty_tpl->tpl_vars['test']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['box']->value;?>

    <div id="login">
        <a href="./views/login.php"><span>登录</span></a>
    </div>
    <a href="./views/authCode.php">验证码</a>
    <a href="./views/info.php">info.php</a>
    <a href="./index.php">index.php</a>
    <a href="./admin/article.php">article</a>



    <div class="jumbotron">
        <h3>文章列表</h3>

        <?php echo '<?php ';?>
foreach ($blogs as $blog): <?php echo '?>';?>

        <div class="col-md-9">
            <a class="article-container" href="./html/artView.php?aid=<?php echo '<?php ';?>
echo $blog['aid']; <?php echo '?>';?>
">
                <span class='article-title'><?php echo '<?php ';?>
echo $blog['title']; <?php echo '?>';?>
</span>
            </a>
        </div>
        <?php echo '<?php ';?>
endforeach;<?php echo '?>';?>


    </div>



    <p id="endText" style="border:2px; color:green">Give me thumbs up!</p>
    <footer>
        All rights belongs to qingtaiss
        <br>
        email: fengtrss@qq.com
        Smile
    </footer>
    <!--加载bootstrap js-->
    <?php echo '<script'; ?>
 src="./libs/jquery/jquery-3.4.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
