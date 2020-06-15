<?php
include '../config.php';
include_once(ROOT."/parts/cookieEat.php");
include_once(ROOT."/parts/loginCheck.php");


/*从数据库读取最新8条的博客标题和内容*/
$sql = "select * from articles where class='读书笔记' order by createdDate desc limit 0,8";
$result = $db->query($sql);

$blogs = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $blogs[] = $row;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php
        include_once(ROOT."/parts/head.php");
    ?>
</head>

<body>

    <?php //include('parts/header.php'); ?>
    <div class="container">
    <?php
            include_once(ROOT."/parts/title.php");
        ?>
        <div class="row clearfix">
        <?php
                include_once(ROOT."/parts/leftCol.php");
            ?>
            <div class="col-md-9 column">
            
                <div class="jumbotron">
                    <h2 class="listTitle">文章列表</h2>
                    <?php include_once(ROOT."/parts/printArticle.php"); ?>
                </div>
                <?php include_once(ROOT."/parts/turnPage.php"); ?>

            </div>
            <?php
                include_once(ROOT."/parts/rightNav.php");
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