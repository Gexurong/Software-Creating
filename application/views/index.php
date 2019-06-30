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
    <title>星趣</title>
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/index.css?v=3"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/common.css?v=5"  rel="stylesheet">
    <link href="https://comicstatic.benghuai.com/new_static_v2/css/swiper.min.css"  rel="stylesheet">
</head>
<style type="text/css">

</style>
<body>
            <div style="    text-align: center;
                font-family: Arial;
                font-size: 28px;
                color: white;
                width: 100%;
                line-height: 60px;
                height: 60px;
                background-color: black;">
                星趣
            </div>
			<div class="poster swiper-container" style="border:none">
        		<div class="swiper-wrapper">	
											<div class="swiper-slide">
						<a href="http://localhost/index.php/book/2">
							<div class='swiper-slide-container'>
                    			<img src="http://localhost/asserts/poster/1.jpg">
                			</div>
						</a>
						</div>
											<div class="swiper-slide">
						<a href="http://localhost/index.php/book/2">
							<div class='swiper-slide-container'>
                    			<img src="http://localhost/asserts/poster/2.jpg">
                			</div>
						</a>
						</div>
											<div class="swiper-slide">
						<a href="http://localhost/index.php/book/3">
							<div class='swiper-slide-container'>
                    			<img src="http://localhost/asserts/poster/3.jpg">
                			</div>
						</a>
						</div>
					        		</div>
        		<div class="swiper-pagination"></div>
    		</div>

			<div class="item-container">
				<div id="new_comic" class="item new-comic-item">
					<div class="item-title">
						<div class="item-title-word-big">漫画推荐</div>
						<div class="item-title-word-small">COMICS</div>
						
					</div>
					<div class="comic-big-container">
						<a href="http://localhost/index.php/book/1/3">
						<div class="item-cover">
							<img src="http://localhost/asserts/poster/20.jpg">
							<div class="item-cover-title">
							海贼王：第三话						</div>
						</div>
						</a>
						<div class="line"></div>
						<div class="comic-swiper swiper-container">
							<div class="swiper-wrapper">
                                <?php foreach ($books as $book_item):?>
                                    <div class="swiper-slide">
									<a href="http://localhost/index.php/book/<?php echo $book_item["id"] ?>">
									<div class="comic-swiper-container">
										<div><img src="http://localhost/asserts/cover/<?php echo $book_item["id"] ?>.jpg"></div>
										<div><?php echo $book_item["name"] ?></div>
									</div>
									</a>
                                    </div>
                                    <?php endforeach; ?>
							</div>
						</div>
						<!--<div class="comic-more">展开漫画目录</div>-->
					</div>
				</div>

			</div>
			<a href="https://www.sjtu.edu.cn/">
			<div class="footer" style="height:100px">
                版权所有 <br>
                School of Software Engineering,<br>
                Shanghai Jiao Tong University <br>
			</div>
			</a>
</div>
</body>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/jquery-1.11.1.min.js"></script>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/common.js?v=5"></script>
<script src="https://comicstatic.benghuai.com/new_static_v2/js/swiper.min.js"></script>
<script>        
  var PosterSwiper = new Swiper ('.poster', {
  	pagination: '.swiper-pagination',
    loop: true,
    speed: 400,
    autoplay: 4000,
    autoplayDisableOnInteraction: false,
  })       
  var ComicSwiper = new Swiper ('.comic-swiper', {
    //loop: true,
    slidesPerView:2.5,
    freeMode: true,
  })     
  </script>
</body>
<script type="text/javascript">

var static_url = "/asserts/";
</script>

</html>