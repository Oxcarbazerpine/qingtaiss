<?php foreach ($comments as $comment): ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <?php 
                //获得用户昵称
                $uid = $comment['uid'];
                $nknameRe = $db->query("select nickname from login where id='$uid'");
                $nkname = $nknameRe->fetch_array();
                echo $nkname[0]; 
            ?>
            <small style="margin-left:20px;"><?php echo $comment['createdDate']; ?></small>
        </h4>
    </div>
    <div class="panel-body">
        <?php echo $comment['content']; ?>
    </div>
</div>

<?php
 
    if (isset($_SESSION['admin']) &&  $_SESSION['admin'] == "on"):
 
?>

<button type='button' class="deleteButton button button-pill button-border button-tiny" value="<?php echo $comment['cmtid']; ?>" style="margin:0px 20px 20px 20px;">删除</button>

<?php
 
    endif;
 
?>
<?php endforeach;?>
<script>
                            $(".deleteButton").click(function() {
                                    console.log( $(this).val());
                                    var sendLoc = "/admin/cmtDelete.php";
                                    var formData = {"cmtId": $(this).val()};
                                    //comment refresh function ajaxly
                                    var func = function(result){
                                        if(result === "删除成功"){
                                            setTimeout(function(){
                                                //ajaxly refresh comments
                                                var refreshLoc = "/html/cmtRefresh.php?aid=<?php echo $aid; ?>"; //提交处理
                                                var refresh = function(result){
                                                    $("#comment-container").html(result);
                                                }
                                                ajaxSubmit(refreshLoc,null,refresh);
                                            },1500);
                                        }
                                    }; 
                                    ajaxSubmit(sendLoc,formData,func,1);
                            });
                </script>