<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HTTP 1.1 -->  
    <meta http-equiv="pragma" content="no-cache">  
    <!-- HTTP 1.0 -->  
    <meta http-equiv="cache-control" content="no-cache">  
    <meta name="applicable-device" content="mobile">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="Copyright" content="miHoYo">
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <meta name="format-detection" content="telephone=no"> 
    <meta name="format-detection" content="email=no" /> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=750px, user-scalable=no" />
    <link rel="icon" href="favicon.ico">
    <title>第一话—《崩坏3》IP站</title>
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/comic.css"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/common.css"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/read.css"  rel="stylesheet">
</head>

<body>
    <?php if ($chapterid != 1) {?>
        <a href="http://localhost/index.php/book/<?php echo $id?>/<?php echo $chapterid-1?>">
            <div class="read-pre">
                点击阅读上一话
            </div>
        </a>
    <?php }
    else {?>
        <div class="read-pre">
            没有上一话哦
        </div>
    <?php }?>
<?php for ($x=1; $x<=$page; $x++) {
    ?>
    <img class="lazy comic_img" data-original="http://localhost/asserts/comic/<?php echo $id?>/<?php echo $chapterid?>/<?php echo $x?>.jpg" src="http://localhost/asserts/comic/<?php echo $id?>/<?php echo $chapterid?>/<?php echo $x?>.jpg" style="display: inline;">
<?php    
}
?>
    <?php if ($last != 1) {?>
        <a href="http://localhost/index.php/book/<?php echo $id?>/<?php echo $chapterid+1?>">
            <div class="read-next">
                点击阅读下一话
            </div>
        </a>
    <?php }
    else {?>
        <div class="read-next">
            没有下一话啦
        </div>
    <?php }?>
You are reading book <?php echo $id ?>, chapter <?php echo $chapterid?>. <br>
This chapter has <?php echo $page ?> pages.
</body>