<!--评论区 -->
<div class="col-md-12 column">
    <div>
        <!-- 编辑区 -->
        <?php $_SESSION['aid']=$aid; ?>
        <form role="form" id="cmtSubmit">
            <div class="form-group">
                <label for="name">编辑评论</label><small>（请先登录）</small>
                <textarea id="cmtText" type="text" name="cmtContent" class="form-control" rows="3" cols="6"
                    required></textarea>
            </div>
            <button type='button' id="submitButton" class="btn btn-default">提交</button>
        </form>
        <script>
        $("#submitButton").click(function() {
            if ( <?php echo $_SESSION['login'] ? 1 : 0; ?> ) { //若已登录允许提交
                var sendLoc = "/html/cmtSubmit.php";
                var formData = $("#cmtSubmit");
                var func = function(result) {
                    if (result === "提交成功") {
                        setTimeout(function() {
                            //ajaxly refresh comments
                            $.ajax({
                                type: "GET",
                                cache: false,
                                processData: false, //将data解析为字符串
                                url: "/html/cmtRefresh.php?aid=<?php echo $aid; ?>", //提交处理
                                contentType: "application/x-www-form-urlencoded; charset=utf-8",
                                success: function(result) {
                                    console.log(result);
                                    $("#comment-container").html(result);
                                },
                                error: function(result) {
                                    alert("failed");
                                    //console.log(result);
                                }
                            })
                        }, 1500);
                    }
                };
                ajaxSubmit(sendLoc, formData, func);
            } else //否则跳到登录界面
            {
                popMsg('请先登录再评论');
                setTimeout(function() {
                    window.location.href = '/views/login.php'; //返回上一页}
                }, 2000);

            }
        })
        </script>
    </div>

    <div class="line-divider" style="margin:20px; height:2px;"></div>
    <!--评论浏览区 -->
    <div id="comment-container">
        <?php include_once(ROOT."/parts/loadComment.php"); ?>
    </div>

</div>