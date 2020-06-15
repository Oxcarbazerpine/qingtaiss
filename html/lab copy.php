<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <title>使用video.js实现rtmp流的直播播放</title>
      <!--引入播放器样式-->
      <link href="http://vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
      <!--引入播放器js-->
      <script src="http://vjs.zencdn.net/5.19/video.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/videojs-flash@2/dist/videojs-flash.min.js"></script>
 </head>
 <body>
 
 
 <!--vjs-big-play-centered 播放按钮居中-->
 <!--poster默认的显示界面，就是还没点播放，给你显示的界面-->
 <!--controls 规定浏览器应该为视频提供播放控件-->
 <!--preload="auto" 是否提前加载-->
 <!--autoplay 自动播放-->
 <!--loop=true 自动循环-->
 <!--data-setup='{"example_option":true}' 可以把一些属性写到这个里面来，如data-setup={"autoplay":true}-->
 
 <video id="my-player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" autoplay="autoplay"
        poster="//vjs.zencdn.net/v/oceans.png" width="500" height="400" data-setup='{}'>
     <!--src: 规定媒体文件的 URL  type:规定媒体资源的类型-->
     <source src='rtmp://live.hkstv.hk.lxdns.com/live/hks' type='rtmp/flv'/>
 </video>
 <script type="text/javascript">
     // 设置flash路径,用于在videojs发现浏览器不支持HTML5播放器的时候自动唤起flash播放器
     videojs.options.flash.swf = 'https://cdn.bootcss.com/videojs-swf/5.4.1/video-js.swf';
     var player = videojs('my-player'); //my-player为页面video元素的id
     //player.play(); //播放
 //    1. 播放   player.play()
 //    2. 停止   player.pause()
 //    3. 暂停   player.pause()
 </script>
 </body>
 </html>