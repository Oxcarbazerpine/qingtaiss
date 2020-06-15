<div id="rightCol" class="col-md-1 column">



    <div id="cover-box">
        <div id="elevator" class="elevator" style="top: 30px;">

            <div class="list-box">
                <div>
                    <a href="/">
                    <div class="item">
                        首页
                    </div>
                    </a>
                    <a href="/html/essay.php?location=essay">
                    <div class="item">
                        随笔
                    </div>
                    </a>
                    <a href="/html/bookNotes.php?location=bookNotes">
                    <div class="item">
                        读书笔记
                    </div>
                    </a>
                    <a href="/html/science.php?location=science">
                    <div class="item">
                    科学&技术
                    </div>
                    <a href="javascript:void(0)" onclick="popMsg('施工中...');">
                    <div class="item">
                    实验室
                    </div>
                    </a>
                    <div class="line-divider"></div>
                    <a href="#top">
                        <div class="item">
                            顶部
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>

     
</div>
<script>
//get middle column height
var maxH = document.getElementsByClassName('col-md-9 column')[0];
//get right column height
var barH = document.getElementById('cover-box');
//set height to equal
barH.style.height = maxH.scrollHeight+'px';
</script>