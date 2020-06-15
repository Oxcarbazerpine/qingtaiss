<?php
session_start();
$image = imagecreatetruecolor(100,30); #图片大小 100 *30
$bgcolor = imagecolorallocate($image,255,255,255); #设置背景色
imagefill($image, 0, 0, $bgcolor); #填充背景色 x,y 分别为填充的起始 x 坐标和 y 坐标，与 x, y 点颜色相同且相邻的点都会被填充。
$captCode = ""; #初始化随机数字
$fontSize = 10; #字体大小

#设置数字坐标
for($i=0; $i<4; $i++){
    $fontColor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120) ); #随机字体颜色
    $rLetter = chr(65+ rand(0,25));#生成一个随机字母
    $rNum = rand(1,9);#生成一个随机数字
    $twoToOne = array($rLetter,$rNum);
    $fontContent =  $twoToOne[rand(0,1)]; #随机选择一个字母或数字
    $captCode .= $fontContent; #数字存到变量里
    $x = ($i*100/4) + rand(5,10); #100为图片长度，分配到1/4的位置，再加个随机值
    $y = rand(5,10); #纵坐标
    //magestring($image,$fontSize,$x,$y,$fontContent,$fontColor); #bool imagestring ( resource $image , int $font , int $x , int $y , string $s , int $col )
    imagestring ( $image ,  $fontSize ,  $x ,  $y ,  $fontContent , $fontColor );
}
#存到session
$_SESSION['authcode'] = $captCode; # {authcode: captCode }
for($i=0; $i<200; $i++){
    $pointColor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200) ); #设置随机点的颜色
    imagesetpixel($image, rand(1,99), rand(1,29), $pointColor); #画出像素点，在图片范围内

}
#再画几条线
#设置线的颜色
for($i=0; $i<4; $i++){
$lineColor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
//设置线，两点一线
imageline($image,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$lineColor);
}
#header(string,replace,http_response_code) 设置头部
header('Content-Type: image/png');
imagepng($image); #设置图片格式
imagedestroy($image); #销毁图片

?>