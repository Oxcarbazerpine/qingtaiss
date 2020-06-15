<?php
    include '../config.php';

    $aid = htmlspecialchars($_GET["aid"]);
    $sql = "delete from articles where aid='$aid'";
    $result = $db->query($sql);
    if ($result){
        echo "<script>alert('已删除');window.history.back();</script>";
        
      }else{
        echo "<script>alert('删除失败');window.history.back();</script>";
      }
?>