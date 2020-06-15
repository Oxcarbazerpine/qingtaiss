<?php foreach ($blogs as $blog): ?>

<div class="well well-lg" onclick="window.location.href = '/html/artView.php?aid=<?php echo $blog['aid']; ?>'">
    <h4>
        <a class="article-container" href="/html/artView.php?aid=<?php echo $blog['aid']; ?>">
            <span class='article-title'><?php echo $blog['title']; ?></span>
        </a>
    </h4>

    <p class="article-intro" style="margin:20px 0px">
        <?php echo mb_substr(strip_tags($blog['content']),0,50); ?>...
    </p>
    <small>浏览：<?php echo $blog['views']; ?></small>

</div>


<?php endforeach;?>