var menu_spread = false;

function setCookieN(name,value,days = 30) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function setCookie(name,value)
{
var Days = 30;
var exp = new Date();
exp.setTime(exp.getTime() + Days*24*60*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg))
return unescape(arr[2]);
else
return null;
}

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

window.onresize = function() {
  check_size();
}

function check_size(){
    var winWidth;
    var winHeight;
    //获取窗口宽度
    if (window.innerWidth)
    winWidth = window.innerWidth;
    else if ((document.body) && (document.body.clientWidth))
    winWidth = document.body.clientWidth;
    //获取窗口高度
    if (window.innerHeight)
    winHeight = window.innerHeight;
    else if ((document.body) && (document.body.clientHeight))
    winHeight = document.body.clientHeight;
    //通过深入Document内部对body进行检测，获取窗口大小
    if (document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)
    {
    winHeight = document.documentElement.clientHeight;
    winWidth = document.documentElement.clientWidth;
    }
    //alert($(".menuscene").height()+" "+$(".menuscene").width());
    $(".landscape").css("display", "none");
    if((winWidth>winHeight) && (getCookie("bhcomic_firstLandscape") == null)){
      $(".landscape").css("display", "block");
      setCookie("bhcomic_firstLandscape", 1);
    }
}

//bind
$(document).ready(function() {
	// login_ticket换l_token
	if (location.search.includes("login_ticket=") && location.search.includes("uid=")) {
        var urlVars = getUrlVars();
		// parse search
		// transform
		// var _domain = "https://devapi-takumi.mihoyo.com";
		var _domain = "https://api-takumi.mihoyo.com";
		$.ajax({
            type: "GET",
			url: _domain + "/auth/api/getLTokenByLoginTicket?login_ticket="
			+ urlVars["login_ticket"] + "&uid=" + urlVars["uid"],
			success: function (data) {
				if (data.retcode === 0) {
                    // setcookie
                    setCookieN("l_token", data.data.ltoken);
                    setCookieN("uid", urlVars["uid"]);
				} else {
					alert("登录失败！");
				}
			}
		});
        // remove search
        window.history.replaceState({}, "", location.href.substr(0, location.href.indexOf("?")));
	}

	$("div").click( function(event){
		event.stopPropagation(); 
	} );

	$("a").click( function(event){
		event.stopPropagation(); 
	} );

	$("img").click( function(event){
		event.stopPropagation(); 
	} );

	$(".first-read-mask").on("touchmove",function(event){
		event.preventDefault();
	}, false);

	$(".header_button").click(function(){
		$(this).css({"pointer-events":"none"});
		if (!menu_spread) {
			$(".header-button-mask").fadeIn(0);
			$(".header_logo").animate({left:"-200px"},150);
			$(".header-menu-mask").delay(300).fadeIn(300);
			$(".header_word").fadeOut(350);
			$(".header_menu_home").delay(100).fadeIn(350);
			$(".header_menu_comic").delay(200).fadeIn(350);
			$(".header_menu_pv").delay(300).fadeIn(350);
			$(".header_menu_cg").delay(400).fadeIn(350);
		}
		else {
			$(".header-button-mask").fadeOut(0);
			$(".header-menu-mask").fadeOut(300);
			$(".header_menu_home").fadeOut(350);
			$(".header_menu_comic").delay(100).fadeOut(350);
			$(".header_menu_pv").delay(200).fadeOut(350);
			$(".header_menu_cg").delay(300).fadeOut(350);
			$(".header_word").delay(750).fadeIn(350);
			$(".header_logo").delay(750).animate({left:"16px"},200);
		}
		menu_spread = !menu_spread;
		setTimeout(function(){
			$(".header_button").css({"pointer-events":"auto"});
		},1000);
		//$(".header_menu").slideToggle(150);
		// if (menu_spread == false) {
		// 	$(".header").css({height:"160px"});
		// 	$(".header_menu").css({height:"75px"});
		// 	$(".mask").css({height:"75px"});
		// }
		// else {
		// 	$(".header").css({height:"85px"});
		// 	$(".header_menu").css({height:"0px"});
		// 	$(".mask").css({height:"0px"});
		// }
		

	});

	$(".header_menu_cg, .new-cg-item .item-title .more-content").click(function(){
		window.location.href = base_url+"cg";
	});

	$(".header_menu_pv, .new-pv-item .item-title .more-content").click(function(){
		window.location.href = base_url+"pv";
	});

	$(".header_menu_comic, .comic-more").click(function(){
		window.location.href = base_url+"book";
	});

	$(".header_menu_home").click(function(){
		window.location.href = base_url;
	});

	$(".header_return").click(function(){
		window.history.back();
	});

	$(".comment-wrapper,.comment-title-button").click(function(){
		$(".modal-mask").fadeIn(300);
	});

	$(".modal-banner-return").click(function(){
		$(".modal-mask").fadeOut(300);
	});

	$(".landscape").click(function(){
		$(".landscape").fadeOut(300);
	});

	$(".modal-post").click(function(){
		//alert(1);
		post_comment();
	});

	$(".modal-post-advice").click(function(){
		//alert(1);
		post_advice();
	});

	$("#comment").bind('propertychange input', function () {  
        var counter = $("#comment").val().length;
        $(".modal-footer").html(counter+"/150");
	});

	$(".modal-avator-item img").click(function() {
		$(this).parent().parent().find(".selected").remove();
		$(this).parent().append("<img class=\"selected\" src=\""+static_url+"image/avator/touxiangkuang.png\">");
		selectedAvator = $(this).parent().attr("id");
	});

	$(".parise-wrapper, .praise-wrapper img").click(function(){
		praise();
	});

	$(".share-wrapper, .share-wrapper div, .share-wrapper div img").click(function(){
		$(".share-mask").fadeIn(300);
	});

	$(".share-return").click(function(){
		$(".share-mask").fadeOut(300);
	});

	$(".image-container img").click(function(){
		var id = $(this).parent().parent().attr("id");
		$(".cg_view_container img").attr("src", static_url+'cg/'+id+'.jpg');
		$(".cg_view_mask").fadeIn(0);
	});

	$(".cg-item .banner, .cg-item img").click(function(){
		var id = $(this).parent().attr("id");
		$(".cg_view_container img").attr("src", static_url+'cg/'+id+'.jpg');
		$(".cg_view_mask").fadeIn(0);
	});

	$(".cg_view_return").click(function(){
		$(".cg_view_mask").fadeOut(0);
		$(".cg_view_container img").attr("src", "");
	});

	$("[class^='first-read']").click(function(){
		$(".first-read-mask").fadeOut(300);
	});

	$(".comic-wrapper img").off().on('click',function() {
        $(".controller-frame").fadeToggle();
	});

	$(".get-more-comment").on("click",function(){
		get_more_comment();
	});

	$(".get-more-comment-advice").on("click",function(){
		get_more_advice();
	});

	$(".return-top, .top_icon").click(function(){
		$('body,html').animate({ scrollTop: 0 }, 200);
	});
});

//read pgae function
function praise() {
	$.ajax({
		url:chapterid+'/praise',
		type:'GET',
		//data:,
		//dataType:,
		success:function(data){
			praise += 1;
            //alert(1);
            $(".praise-wrapper img").attr("src", static_url+"image/btn_heart_on.png");
			$(".praise-wrapper,.praise-wrapper img").off();
			setCookie("praise"+bookid+","+chapterid, 1);
		},
	});
}

function updateShare(content){
    share_api.updateContent(
        {
            title   :    content,
            desc    :    content,
            link    :    "http://event.mihoyo.com/SakuraHB/index.php",
            pic     :    "http://static.event.mihoyo.com/SakuraHB/resources/share_icon.jpg",
        }   
    )
}

function initShare(){
    share_api = new MiHoYoShareApi(
        config = {
            "name"        :  "share_api",
            "enviroment"  :  "production",
            "title"       :  "崩坏3的漫画《"+booktitle+" "+chaptertitle+"》真是太好看了！你也来一起看吧！",
            "desc"        :  "崩坏3的漫画《逃离长空篇 序章 琪亚娜·出击》真是太好看了！你也来一起看吧！",
            "link"        :  base_url+'book/'+bookid,
            "pic"         :  "",
            "bind" :  {
                "weixin":"weixin_share",
                "weibo":"weibo_share",
                "tieba":"tieba_share",
            },
            "onclick" :  {
                "weixin":function(){
                    $(".weixin_notice").fadeIn();
                    $(".weixin_notice").delay(1500).fadeOut();
                },
                "weibo":function(){
                    
                },
                "tieba":function(){
                    
                }
            }
        },
        callback = function(destination){
            console.log(2);
        }
    );
}


//comment page function
function post_comment() {
	if ($("#nickname").val() == "") {
		alert("你还没有填写名字哦！");
		return;
	}
	else if ($("#comment").val() == "") {
		alert("你还没有填写内容哦！");
		return;
	}
	else{
		console.log("here");
		$.ajax({
			url:window.location.href+'/post_comment',
			type:'POST',
			dataType:'json',
			data:{
				nickname: $("#nickname").val(),
				comment: $("#comment").val(),
				avator: selectedAvator,
			},
			success:function(data){
					alert("评论成功！");
			}
		});
	}
	
}

function get_more_advice(){
	$.ajax({
		url:'get_more_advice/'+get_time+'/'+offset,
		type:'GET',
		dataType:'json',
		success:function(data){
			get_time += 1;
			if (data.atend == true) {
				$(".get-more-comment-advice").html("后面没有啦");
				$(".get-more-comment-advice").off();
			}
			for (var i in data.comment) {
				if(!data.comment[i].comment||data.comment[i].comment==""){
					continue;
				}
				if(!data.comment[i].nickname|| data.comment[i].nickname==""){
					data.comment[i].nickname = "不知名的读者";
				}
				var content = '<div>';
				content += '<div class="comment-item">';
				content += '<div class="comment-item-avator">';
				content += '<img src="'+static_url+'image/avator/icon'+data.comment[i].avator+'_off.png?v=2">';
				content += '</div> ';
				content += '<div class="comment-item-info">';
				content += '<div>';
				content += '<span>'+data.comment[i].nickname+'</span>';
				content += '<span>'+data.comment[i].timestamp+'</span>';
				content += '</div>';
				content += '<p>'+data.comment[i].comment+'</p>';
				content += '</div>';
				content += '</div>';
				content += '</div>';
				$("#comment_div").append(content);
			}
		}
	});
}

function get_more_comment(){
	$.ajax({
		url:'get_more_comment/'+get_time+'/'+offset,
		type:'GET',
		dataType:'json',
		success:function(data){
			get_time += 1;
			if (data.atend == true) {
				$(".get-more-comment").html("后面没有啦");
				$(".get-more-comment").off();
			}
			for (var i in data.comment) {
				if(!data.comment[i].comment||data.comment[i].comment==""){
					continue;
				}
				if(!data.comment[i].nickname|| data.comment[i].nickname==""){
					data.comment[i].nickname = "不知名的读者";
				}
				var content = '<div>';
				content += '<div class="comment-item">';
				content += '<div class="comment-item-avator">';
				content += '<img src="'+static_url+'image/avator/icon'+data.comment[i].avator+'_off.png?v=2">';
				content += '</div> ';
				content += '<div class="comment-item-info">';
				content += '<div>';
				content += '<span>'+data.comment[i].nickname+'</span>';
				content += '<span>'+data.comment[i].timestamp+'</span>';
				content += '</div>';
				content += '<p>'+data.comment[i].comment+'</p>';
				content += '</div>';
				content += '</div>';
				content += '</div>';
				$("#comment_div").append(content);
			}
		}
	});
}


//chapter page function
function get_all_chapter(id) {
	$(document).ready(function(){
 		$.ajax({
 			url:id+'/get_chapter',
 			type:'GET',
 			dataType: 'json',
 			success:function(data) {
 				$(".detail_chapter").html('');
 				//$(".detail_chapter").css("height", ((parseInt(data.length/3)+1)*8+4)+"rem");
 				for (var i in data) {
 					var content = "<div class='detail_chapter_container'><a href=\""+base_url+'book/'+data[i].bookid+'/'+data[i].chapterid+"\"><div class='detail_chapter_container_img'>";
 					content += "<img src=\""+comic_url+"comic/chapter_cover/"+data[i].bookid+"/"+data[i].chapterid+".jpg\">";
 					content += "</div><div class='detail_chapter_container_banner'>"+data[i].title+"</div></div>";
 					$(".detail_chapter").append(content);
 				}
                var addnum = 3-parseInt(data.length)%3;
                for(var k=0;k<addnum;k++){
                    $(".detail_chapter").append("<div style='width:225px'></div>");
                }
 				$(".chapter_getmore_div").fadeOut(0);
 			},
 		});
	});
}

/*
function check_size(){
    var winWidth;
    var winHeight;
    //获取窗口宽度
    if (window.innerWidth)
    winWidth = window.innerWidth;
    else if ((document.body) && (document.body.clientWidth))
    winWidth = document.body.clientWidth;
    //获取窗口高度
    if (window.innerHeight)
    winHeight = window.innerHeight;
    else if ((document.body) && (document.body.clientHeight))
    winHeight = document.body.clientHeight;
    //通过深入Document内部对body进行检测，获取窗口大小
    if (document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)
    {
    winHeight = document.documentElement.clientHeight;
    winWidth = document.documentElement.clientWidth;
    }
    //alert($(".menuscene").height()+" "+$(".menuscene").width());
    $("html").css("font-size",winWidth/375*16+"px");
 }*/