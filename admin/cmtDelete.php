<?php
    include '../config.php';

    $cid = htmlspecialchars($_POST["cmtId"]);
    $sql = "delete from comment where cmtid ='$cid'";
    $result = $db->query($sql);
    if ($result){
        echo '删除成功';
        
      }else{
        echo '删除失败';
      }
?>