<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php 
global $wpdb;
$tab_post=$wpdb->prefix . "posts";
$sql="SELECT guid from $tab_post where post_excerpt='emblem'";
$emblem=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='v'";
$v=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='footbg'";
$footbg=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='flowerdown'";
$flowerdown=$wpdb->get_row($sql);
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/css.css">
<style>
	.footslid{width:100%;height: 300px;position: relative;}
	.ftitle{width: 100%;height: 40px;background: rgba(255,255,255,0.5);position: absolute;bottom: 0px !important;z-index: 10;text-align: center;line-height: 40px;}
	#jswbox{position: absolute;top:0px;left: 0px;}
	.bbl{width: 100%;background:url('<?php echo $footbg->guid?>') no-repeat;background-size:cover;position: relative;color:rgba(255,255,255,0.5);}
	/*.bblimg{width: 100%;height: 80%}*/
	.demo{width: 100px;height: 100px;background: rgba(255,0,0,0.5);}
	.copyright{width: 60%;height: 30%;position: absolute;top:33%;left:20%;}
	/*.copylink{float: left;width:16.5%;height:15%;margin: 0;padding: 0;text-align: center;font-size: 14px;}*/
	.copylink a{color:rgba(255,255,255,0.5);}
	.copych{width: 100%;height: 15%;position: absolute;top: 40%;text-align: center;}
	.copyen{width: 100%;height: 15%;position: absolute;top: 47%;text-align: center;}
	.friendlink{width:70%;height: 30%;position: absolute;top: 70%;left: 15%;text-align: center;}
	.cleft{width: 40%;height: 100%;float: left;text-align: center;font-size: 11px;}
	.cright{width: 50%; height: 100%;float: right;text-align: center;font-size: 11px;}
	.friendname{width: 40%;height: 100%;text-align: right;float: left;}
	.friendimg{height: 100%;width: 10%;float: left;margin-left:7% ;margin-right:7% ;margin-top: -10px;}
	.friendval{height: 100%;width: 31%;float: left;text-align: left;}
	.h_link{width: 100%;height: 20px;text-align: center;position: absolute;top:29%;}
	.h_link a{color: rgba(255,255,255,0.5);margin:0 20px;font-size: 14px; }
	.copych,.copyen{font-size: 13px}
	.fflink{width: 70%;height:20px;text-align: center;position: absolute;top: 59%;left:30%;line-height: 20px;color:#ccc;font-size: 13px;vertical-align:middle; }
	.fflink a{color:#ccc;}
	.fflink div{float:left;}
	/*.gong{width: 14px;margin:0 10px;padding-top: 10px;position: relative;float: left;}*/
	.gong img{width: 20px;margin:-5px 15px 0px; }
	.foot_nav{width: 80%;margin-left:10%;position: fixed;bottom: 0px;z-index: 1000;}
	.wbar{width: 100%;position: absolute;background:rgba(255,255,255,0.5)}
	.arrow{width: 30px;height: 30px;position: absolute;top:-15px;left:49%;background: url('<?php echo $flowerdown->guid?>');background-size: cover;}
	.flower{height:140%;width: 65px;margin-left: 1%;float: left;}
</style>
</head>
<script>
	function AddFavorite(sURL, sTitle){
	    try{
	        window.external.addFavorite(sURL, sTitle);
	    }
	    catch (e){
	        try{
	            window.sidebar.addPanel(sTitle, sURL, "");
	        }
	        catch (e){
	            alert("加入收藏失败，请使用Ctrl+D进行添加");
	        }
	    }
	}
	function setHome(obj,url){
	    try{
	        obj.style.behavior = 'url(#default#homepage)';
	        obj.setHomePage(url);
	    }catch(e){
	        if(window.netscape){
	            try{
	                netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
	            }catch(e){
	                alert('抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车\n\n然后将[signed.applets.codebase_principal_support]的值设置为true，双击即可。');
	            }
	            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
	            prefs.setCharPref('browser.startup.homepage',url);
	        }else{
	            alert('抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【' + url + '】设置为首页。');
	        }
	    }
	}
</script>
<body>
<div class="bbl">
	<div class="h_link">
		<a href="javascript:;"onclick="setHome(this,window.location);">设为首页</a>
			<span class="line">|</span>
			<a href="javascript:AddFavorite(window.location,document.title)" >加入收藏</a>
			<span class="line">|</span>
			<?php 
				global $wpdb;
				$table_link = $wpdb->prefix . "links";
				$sql="SELECT link_url,link_name FROM $table_link WHERE link_notes='footer'";
				$linkarr=$wpdb->get_results($sql);
				foreach($linkarr as $val){
			?>
			<a href="<?php echo $val->link_url?>"><?php echo $val->link_name?></a>
			<span class="line">|</span>
			<?php }?>
	</div>
	<div class="copych">版权所有: <?php echo get_option('cp_right'); ?>通信地址: <?php echo get_option('cp_add'); ?> 邮编:<?php echo get_option('cp_postal'); ?> E-mail:<?php echo get_option('cp_email'); ?></div>
	<div class="copyen"><?php echo get_option('cp_en'); ?></div>
	<div class="fflink">
	<?php //var_dump($wpdb);?>
		<div>友情链接&nbsp;:</div><a href=""><div class="gong"><img src="<?php echo $emblem->guid?>" alt=""/></div></a><a href=""><div style="margin-right: 100px;">[承诺书]</div></a><div><img src="<?php echo $v->guid?>" alt="" width="15px" height="15px" />&nbsp;旅游标准化：<?php echo get_option('cp_norm'); ?></div>
	</div>
</div>
<div class="foot_nav">
	<div class="wbar">
		<div class="arrow"></div>
		<?php 
			$table_terms = $wpdb->prefix . "terms";
			$table_term = $wpdb->prefix . "term_relationships";
			$table_post = $wpdb->prefix . "posts";
			$preg='/<a href="(.*?)"><\/a>/';
			$cid=$wpdb->get_row("SELECT term_id FROM $table_terms WHERE slug='flower'");
			$arr1 = $wpdb->get_results( "SELECT object_id FROM $table_term where  term_taxonomy_id=$cid->term_id" );
			foreach($arr1 as $key=>$val){
				$arr2 = $wpdb->get_row( "SELECT guid,post_content FROM $table_post where  ID=".$arr1[$key]->object_id);
				$strold=$arr2->post_content;
				$res=preg_match($preg,$strold,$strarr);
				
		?>
		<a href="<?php echo $strarr[1];?>"><div class="flower" style="background: url(<?php echo $arr2->guid;?>);background-size: cover;"></div></a>
		<?php }?>
	</div>
</div>
</body>
<script>
$('.flower').mouseover(function(){
	$old=$(this).css('backgroundImage').replace('url(','').replace(')','');
	$new=$old.replace('2.png','1.png');
	$(this).css("background-image",'url('+$new+')');
	$(this).parent().siblings('a').each(function(){
		$old2=$(this).children().css('backgroundImage').replace('url(','').replace(')','');
		$new2=$old2.replace('1.png','2.png');
		$(this).children().css("background-image",'url('+$new2+')');
	});
});
$('.foot_nav').css('height',$('.foot_nav').width()*0.08+'px');
$('.wbar').css({height:$('.foot_nav').height()*0.7+'px',top:$('.foot_nav').height()*0.3+'px'});
$('.flower').css({height:$('.wbar').height()*1.3+'px',width:$('.wbar').height()*1.3*70/114+'px',marginTop:-$('.wbar').height()*0.4+'px',marginLeft:$('.wbar').width()*0.02+'px'});
	$('.line').last().empty();
	$('.sliderPlay').css('height',$('.sliderPlay').width()/1920*1080);
    $(function () {
        $('#sliderPlay2').sliderPlay({
            speed: 1000, //动画效果持续时间
            timeout: 5 * 1000,//幻灯间隔时间
            btnBox: 'btnBox2', //按钮的容器id
            nextBtn: 'arrow-next',
            btnCurClassName: 'cur', //当前按钮的className,
            direction: 'up', //left , up
            mouseEvent: 'hover' //事件类型，默认是click ,hover
        });
    });
	$('.arrow-next').css('bottom',$('.sliderPlay').height()*0.3);
	$('.bbl').css('height',$(window).width()*0.25+'px');
	$('.footslid').css('height',parseInt($('.footslid').width()/5*0.77));
	$('.linkimg1').css('width',$('.linkimg1').height());
	$('.upshow').css('left',$(window).width()*0.5-15+'px');
    $(function(){
    $('.hot').css('height',$(window).width()/1920*1156/4).css('margin-top',-$('.hot').height()+1+'px');
	$('.menu>li').css('line-height',$(window).width()/1920*70+'px');
	$('.ench').css('line-height',$(window).width()/1920*70+'px');
	$('.menu>li>a>span').attr('style','font-size:'+parseInt($('.menu>li').height()*2/7)+'px');
	$('.nav_bg>li>a>span').attr('style','font-size:'+parseInt($('.menu>li').height()*2/7)+'px');
	$('.ench a').attr('style','font-size:'+parseInt($('.menu>li').height()*2/7)+'px');
	$('.sub-menu>li>a>span').attr('style','font-size:'+parseInt($('.menu>li').height()*2/7)+'px');
	$('.sub-menu>li').css('line-height',$(window).width()/1920*70+'px');
	$('.huge_it_slideshow_dots_thumbnails_1 ').css('top',$(window).width()/1920*400);
	$('.left_line').css('height',$('.banner0').height()*0.34+74+$('.er_left_nav').height()+'px');
	
	});
	$('.mynav').css('height',$(window).width()/1920*70+'px');
	bigwidth=1920;
	$('.middle').css('height',$('.middle').width()*0.52);
	$('.midimg>img').css('height','100%');
	window.onresize=function(){$('.middle').css('height',$('.middle').width()*0.52);
	$('.mynav').css('height',$(window).width()/bigwidth*70+'px');
	$('.menu>li>a>span').attr('style','font-size:'+parseInt($('.mynav').height()*2/7)+'px');
	$('.ench a').attr('style','font-size:'+parseInt($('.mynav').height()*2/7)+'px');
	$('.sub-menu>li>a>span').attr('style','font-size:'+parseInt($('.mynav').height()*2/7)+'px');
	$('.menu>li').css('line-height',$(window).width()/bigwidth*70+'px');
	$('.ench').css('line-height',$(window).width()/bigwidth*70+'px');
	$('.sub-menu>li').css('line-height',$(window).width()/bigwidth*70+'px');
	$('.hot').css('height',$(window).width()/1920*1156/4).css('margin-top',-$('.hot').height()+1+'px');
	$('.travel').css('height',$(window).width()/1920*1156/4);
	$('.er_wen_pic').css('height',$('.er_wen_pic').width()*0.575);
	$('.er_right_div').css('height',$('.er_wen_pic').height());
	$('.er_left_nav').css('height',$('.er_wen_pic').height());
	$('.nav_bg').css('height',$('.er_left_nav').height()*0.17);
	$('.nav_bg').css('lineHeight',$('.nav_bg').height()+'px');
	$('.nav_bg>li>a>span').attr('style','font-size:'+parseInt($('.mynav').height()*2/7)+'px');
	$('.fiveimg').css('height',parseInt($('.fiveimg').width()/5*0.77));
	$('.down_link').css('lineHeight',$('.down_link').height()+'px');
	$('.bbl').css('height',$(window).width()*0.29+'px');
	$('.left_line').css('height',$('.banner0').height()*0.34+$('.er_left_nav').height()+76+'px');
	$('.ban_qiu').css('height',$(window).width()*20/1920+'px');
	$('.ban_qiu').css('width',$(window).width()*20/1920+'px');
	
	$('.huge_it_slideshow_dots_thumbnails_1 ').css('top',$(window).width()/1920*400);
	$('.upshow').css('left',$(window).width()*0.5-15+'px');
	
	$('.sliderPlay').css('height',$('.sliderPlay').width()/1920*1080);
	$('.arrow-next').css('bottom',$('.sliderPlay').height()*0.3);
	$('.pro_first').each(function(){
        $(this).css('height',$(this).width()*0.47+'px');
    });
    $('.mbottom').css('marginBottom',$('.pro').width()*0.01+'px');
    $('.pro_all').each(function(){
        $(this).css('height',$(this).width()*0.55+'px');
    });
    $('.pro_img').each(function(){
        $(this).css({width:$(this).parent().width()+'px',height:$(this).parent().height()+'px'});
    });
    $('.bottom_bar').each(function(){
        $(this).css('height',$(this).parent().height()*0.15+'px');
    });
    $('.bar_left').each(function(){
        $(this).css({width:$(this).parent().width()*0.73-1+'px'}).next().css({marginTop:$(this).height()*0.1+'px'}).next().css({width:$(this).parent().width()*0.27+'px',padding:$(this).height()*0.3+'px',fontSize:$(this).height()*0.4+'px'});
    });
    $('.bar_first').each(function(){
        $(this).css('fontSize',$(this).height()*0.32+'px');
    });
    $('.bar_all_left').each(function(){
        $(this).css({width:$(this).parent().width()*0.5+'px',lineHeight:$(this).height()+'px',fontSize:$(this).height()*0.6+'px'}).next().css({width:$(this).parent().width()*0.39+'px',padding:$(this).height()*0.2+'px',fontSize:$(this).height()*0.6+'px'});
    });
    $('.car').each(function(){
        $(this).css({width:$(this).parent().parent().parent().height()*0.8+'px',height:$(this).parent().parent().parent().height()*0.8+'px',top:$(this).parent().parent().parent().height()*0.1+'px',right:$(this).parent().parent().width()*0.1+'px'});
    });
    $('.tab_bar').css('height',$(window).width()*0.067+'px');
    $('.tab_pic').css({width:$('.tab_bar:first').height()*0.8+'px',height:$('.tab_bar:first').height()*0.8+'px',marginTop:$('.tab_bar:first').height()*0.1+'px',marginLeft:$('.tab_pic').parent().width()*0.2+'px'});
    $('.tab_word').css({height:$('.tab_pic').parent().height()*0.4+'px',marginTop:$('.tab_pic').parent().height()*0.3+'px',marginLeft:$('.tab_pic').parent().width()*0.06+'px',lineHeight:$('.tab_pic').parent().height()*0.4+'px'});
	$('.foot_nav').css('height',$('.foot_nav').width()*0.08+'px');
	$('.wbar').css({height:$('.foot_nav').height()*0.7+'px',top:$('.foot_nav').height()*0.3+'px'});
	$('.flower').css({height:$('.wbar').height()*1.3+'px',width:$('.wbar').height()*1.3*70/114+'px',marginTop:-$('.wbar').height()*0.4+'px',marginLeft:$('.wbar').width()*0.02+'px'});
	}
	$('.travel').css('height',$(window).width()/1920*1156/4);
	$('.fiveimg').css('height',parseInt($('.fiveimg').width()/5*0.77));
	$('.down_link').css('lineHeight',$('.down_link').height()+'px');
	$('.five_imgall').mouseenter(function(i){
		var i=$(this).index();var arr1=new Array('0','18%','38%','58%','76%');$(this).addClass('box-shadow-1 zind').stop().animate({width:'24%',height:'110%',top:'-5%',left:arr1[i]},500);$(this).children().eq(1).stop().animate({backgroundPositionY:'-70px'},500).css('color','#fff');}).mouseleave(function(i){
		var i=$(this).index();var arr2=new Array('0','20%','40%','60%','80%');$(this).stop().animate({width:'20%',height:'100%',top:'0',left:arr2[i]},500,function(){$(this).removeClass('box-shadow-1 zind')});$(this).children().eq(1).stop().animate({backgroundPositionY:'0px'},500).css('color','#000');
		});
    $('.arrow').toggle(function(){
    	$(this).css('transform','rotate(-180deg)').parent().parent().animate({height:$('.foot_nav').height()*0.3+'px'},500);
    },function(){
    	$(this).css('transform','rotate(0deg)').parent().parent().animate({height:$('.foot_nav').children().height()*1.4+'px'},500);
    });
</script>
</html>
<?php
