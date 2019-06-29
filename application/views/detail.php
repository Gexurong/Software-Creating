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
    <title><?php echo $book["name"]?>—星趣</title>
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/common.css?v=5"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/comic.css?v=3"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/comment.css?v=3"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/swiper-3.4.2.min.css"  rel="stylesheet">
    <style type="text/css">
    .comic-header{
        background-image: none;
        overflow: hidden;
        
    }

    .comic-header-upper-mask{
        background-image: none;
        overflow: hidden;
    }

    .comic-header-menu{
        background-image: none;
        overflow: hidden;
    }

    .mask{
        position:  absolute;
        left: 0;
        top:85px;
        display: block;
        width: 100%;
        height: 0;
        overflow: hidden;
        z-index: 2;
        -webkit-transition: height 0.4s;
        -moz-transition: height 0.4s;
        -o-transition: height 0.4s;
        transition: height 0.4s;
        background-color: #1f2947;
    }

    .mask_cover_bg{
        top:-135px;
    }



    </style>
</head>
<body>
    <div class="bg"></div>
    <div class="mask">
        <img class='cover_bg mask_cover_bg' src='https://comicstatic.benghuai.com/new_static_v2/comic/book_cover/1014.jpg'>
    </div>
    <div style="    text-align: center;
    font-size: 28px;
    color: white;
    width: 100%;
    line-height: 60px;
    height: 60px;
    background-color: black;">
        <div style="position:absolute;padding-left:20px"><a href="http://localhost/index.php" style="color:white"><</a></div>
                星趣
            </div>
    <div class='detail_img_bg'>
    	<img class='cover_bg' src='http://localhost/asserts/cover/<?php echo $book['id']?>.jpg'>
    </div>
    <div class='detail_img'>
        <img class='cover' src='http://localhost/asserts/cover/<?php echo $book['id']?>.jpg'>
    </div>
    <div class="title"><?php echo $book["name"]?></div>
    <div class='read'>
                <a href="http://localhost/index.php/book/<?php echo $book['id']?>/1"<div class='read_button'>开始阅读</div></a>
    </div>
    <div class='detail_info1'>
    <?php echo $book["instruction"]; ?></div>
    <div class='line'></div>
    <div class='detail_info2'>
    </div>
    <div class='detail_chapter' style="width:100%; left:auto">
    <?php for ($x=1; $x<=$book["chapter"]; $x++) {
            ?>
            <div class='detail_chapter_container' style="width:100%;border-radius:0">
            <a href="http://localhost/index.php/book/<?php echo $book['id']?>/<?php echo $x?>">
                <div class='detail_chapter_container_banner' style="border-radius:12px"> 第 <?php echo $x?> 话 </div>
            </a>
            </div>
            <div class="line"></div>
    <?php } ?>  	    	
    </div>
    <div class="comment-title">评论<div class="comment-title-small-word">COMMENTS</div><div class="comment-title-button">添加评论</div></div>

    <div id='comment_div'>
        <?php foreach ($comment as $comment_item):?>
            <div class="comment-item">
                <div class="comment-item-avator">
                    <img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon<?php echo $comment_item['avator']?>_off.png?v=2">
                </div> 
                <div class="comment-item-info">
                    <div>
                        <span><?php echo $comment_item['name']?></span> 
                        <span><?php echo $comment_item['time']?></span>
                    </div>
                    <p><?php echo $comment_item['content']?></p>
                </div>
            </div> 
    <? endforeach;?>
    </div>

    <div class="footer">
    </div>

</div>
</body>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/jquery-1.11.1.min.js"></script>
<script src="http://localhost/asserts/common.js"></script>
<script type="text/javascript">
 	var static_url = "https://comicstatic.benghuai.com/new_static_v2/";
    var base_url = "/";
    var comic_url = "https://comicstatic.benghuai.com/new_static_v2/";
</script>
<div class="modal-mask" style="display:none">
    <div class="modal-container1">
		<div class="modal-banner">
			添加评论
			<div class="modal-banner-return">×</div>
		</div>
		<div class="modal-line"></div>
		<div style="height:10px;position:relative"></div>
		<div class="modal-body">
			<span>选择头像</span>
			<div class="swiper-container modal-avator-container">
		        <div class="swiper-wrapper">
		            <div id="1" class="modal-avator-item swiper-slide">
						<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon1_off.png?v=2">
						<img class="selected" src="https://comicstatic.benghuai.com/new_static_v2/image/avator/touxiangkuang.png?v=2">
		            </div>
		            <div id="2" class="modal-avator-item swiper-slide">
		            	<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon2_off.png?v=2">
		            </div>
		            <div id="3" class="modal-avator-item swiper-slide">
		            	<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon3_off.png?v=2">
		            </div>
		            <div id="4" class="modal-avator-item swiper-slide">
		            	<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon4_off.png?v=2">
		            </div>
		            <div id="5" class="modal-avator-item swiper-slide">
		            	<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon5_off.png?v=2">
		            </div>
		            <div id="6" class="modal-avator-item swiper-slide">
						<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon6_off.png?v=2">
		            </div>
		            <div id="7" class="modal-avator-item swiper-slide">
						<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon7_off.png?v=2">
		            </div>
		            <div id="8" class="modal-avator-item swiper-slide">
						<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon8_off.png?v=2">
		            </div>
		            <div id="9" class="modal-avator-item swiper-slide">
						<img src="https://comicstatic.benghuai.com/new_static_v2/image/avator/icon9_off.png?v=2">
		            </div>
		        </div>
			</div>
			<div class="modal-nickname">
				<input type="text" id="nickname" maxlength="10" placeholder="请输入昵称" spellcheck="false">
			</div>
			<div class="modal-comment">
				<textarea id="comment" maxlength="150" placeholder="请输入评论" spellcheck="false"></textarea>
			</div>
			<div class="modal-footer">0/150</div>
			<div class="modal-post">发送</div>
		</div>
    </div>
</div>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/jquery-1.11.1.min.js"></script>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/swiper-3.4.2.min.js"></script>

<script type="text/javascript">

$(".detail_img_bg").height($(".detail_info1").height()+395);
</script>

<script type="text/javascript">
var selectedAvator = 1;
var swiper = new Swiper('.swiper-container',{

	observer:true,
	slidesPerView:4.3,
	observeParents:true,
	freeMode:true,
	
});
</script>

</html>