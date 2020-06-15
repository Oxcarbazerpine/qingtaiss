<?php
include '../config.php';

/*从数据库读取最新10条的博客标题和内容*/
$sql = "select * from articles order by createdDate desc";
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


    <div class="container">
        <?php
            include_once(ROOT."/parts/title.php");
        ?>

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">

                    <div>
                    <div><a href="/admin/phpConfig.php">phpInfo</a></div>
                        <div><a href="/admin/newArticle.php?aid=0">写文章</a></div>
                        
                        <div>
                        <a href="/">设置</a>
                        </div>
                    </div>
                    <div>
                        <h2 class="listTitle">文章列表</h2>
                        <?php foreach ($blogs as $blog): ?>
                        <h4>
                            <a class="article-container" href="/html/artView.php?aid=<?php echo $blog['aid']; ?>">
                                <span class='article-title'><?php echo $blog['title']; ?></span>
                            </a>
                        </h4>

                        <p class="article-intro">
                            <?php echo mb_substr(strip_tags($blog['content']),0,50); ?>
                        </p>
                        <p>
                            <a href="/admin/editArticle.php?aid=<?php echo $blog['aid']; ?>" style="font-size:15px; color:purple;">编辑</a>
                            <!-- iframe实现 php捕捉鼠标点击 -->
                            <a href="/admin/deleteArticle.php?aid=<?php echo $blog['aid']; ?>" style="font-size:15px; color:purple;">删除</a>

                        </p>
                        <div class="line-divider" style="margin:20px; height:2px;"></div>
                        <?php endforeach;?>
                    </div>

                   

                </div>
            </div>
        </div>
    </div>
    <!--加载js-->
    <script type="text/javascript" src="/static/js/appendScript.js"></script>
    <script>appendScript(jsFiles,"off");</script>
</body>

</html>