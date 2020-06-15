<?php
    include '../config.php';

    $aid = htmlspecialchars($_GET["aid"]);
    $sql = "select * from articles where aid='$aid'";
    $result = $db->query($sql);
    $atc = $result->fetch_array(); 
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php
        include_once(ROOT."/parts/head.php");
    ?>
        <style type="text/css">
        .toolbar {
            border: 1px solid #ccc;
        }
        .text {
            border: 1px solid #ccc;
            height: 600px;
        }
    </style>
</head>



<body>


    <div class="container">
        <?php
            include_once(ROOT."/parts/title.php");
        ?>

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">

                    <form id="articleEdit" role="form">
                        <div class="form-group">
                            <label for="name" style="display:block;">标题</label>
                            <input id='title' name='title' type='text' value=<?php echo $atc['title']; ?>
                                class="form-control" style="width:auto" />
                        </div>
                        <div class="form-group">
                            <div  id="toolDiv"  class="toolbar">
                                
                            </div>
                            <div id="textDiv" class="text">
                                    <?php echo $atc['content']; ?>
                            </div>
                            <input type="hidden" name="content" id='transCont' />
                        </div>
                        <div class="form-group">
                            <label for="name">类别</label>
                            <select name="class" class="form-control" style="width:auto;">
                                <option value="随笔" selected>随笔</option>
                                <option value="读书笔记">读书笔记</option>
                                <option value="科学技术">科学技术</option>
                                <option value="IT">IT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type='button' id="submitButton" class="btn btn-default">提交</button>
                        </div>


                    </form>

                    <!--<button id="btn2">获取text</button> -->

                    <script type="text/javascript" src="/libs/editor/release/wangEditor.min.js"></script>
                    <script type="text/javascript">
                    var E = window.wangEditor
                    var editor = new E('#toolDiv','#textDiv')
                    // 或者 var editor = new E( document.getElementById('editor') )
                    // editor.customConfig.pasteFilterStyle = false
                    // editor.customConfig.pasteTextHandle = function (content) {};
                    editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
                    editor.create()
                    </script>


                    <script>
                    function transArt() {
                        // 读取 text
                        var transCont = document.getElementById('transCont')
                        transCont.value = editor.txt.html()
                        console.log(transCont.value);
                    }
                    </script>
                    <script>
                        //若利用button的submit的type提交：$("#cmtSubmit").submit(function() {
                            $("#submitButton").click(function() {
                                    transArt(); // 读取富文本内容

                                    var sendLoc = "articleSubmit.php?aid=<?php echo $aid; ?>";
                                    var formData = $("#articleEdit").serialize();
                                    var func = function(result){
                                        // console.log(result+typeof(result)+result.length);
                                        if(result.length == 5 ){
                                            console.log(result+typeof(result));
                                            setTimeout(function(){
                                                window.history.back();//返回上一页}
                                            },1200);
                                        }
                                    }; 
                                    ajaxSubmit(sendLoc,formData,func,1);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <!--加载js-->
    <script type="text/javascript" src="/static/js/appendScript.js"></script>
    <script>appendScript(jsFiles,"off");</script>
</body>

</html>