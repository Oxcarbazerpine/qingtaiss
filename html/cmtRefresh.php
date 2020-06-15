<?php

include '../config.php';

$aid = htmlspecialchars($_GET["aid"]);
$sql = "select * from comment where aid='$aid' order by createdDate desc";
$result = $db->query($sql);
$comments = array();
while ($row = $result->fetch_array()) {
    $comments[] = $row;
    }
?>

<?php include_once(ROOT."/parts/loadComment.php"); ?>

