<?php 
/*
Template Name:二级页面1

 */
get_header(); ?>
<style>
	ul.breadcrumbs {
	list-style: none;
	padding: 0;
	margin: 0;
	font-size:14px;
	}
	ul.breadcrumbs li {
	float: left;
	margin: 0 5px 0 0;
	padding: 0;
	}
	.er_count{width: 100%;}
	.banner0{width: 100%;position: relative;}
	.banner0 img{width: 100%;}
	.ban_qiu{width: 20px;height: 20px;background: #caaa45;position: absolute;bottom: 34%;left:17%;z-index: 2;border-radius: 40px;}
	.cenav>ul>li{display: inline!important;}
	.er_wen{width: 65%;margin: 0 auto;clear: both;}
	.mbxie{width: 80%;float: left;height: 80px;line-height: 80px;}
	.er_left_nav{width: 20%;float: left;margin-right: 6%;clear: both;position: relative;}
	.er_right_div{width: 15%;float: right;background: #caaa45;}
	.er_wen_pic{width: 58%;height: 300px;float: right;background: #ccc;margin-right: 1%;overflow: hidden;}
	.er_wenzi{width:100%;clear:both;padding: 10px;}
	/*.er_wenzi img{display: none}*/
	.nav_bg{width: 100%;height: 18%;background: url('http://localhost/wordpress/wp-content/uploads/2017/01/bai.png') 0 0 no-repeat;margin-top: 6%;text-align: center;}
	.left_line{width: 1px;height: 540px;background: #caaa45;position: absolute;bottom: 4px;z-index: 2;}
	.mynav{top:40px;}
	.user p{color:#fff;float: right;margin-right: 10%;}
	.user p a{color:#fff;}
</style>
<div class="user"><p><a href=" http://localhost/wordpress/登录/">登录</a>&nbsp;|&nbsp;<a href=" http://localhost/wordpress/注册/">注册</a></p></div>
<div class="er_count">
	<?php
		$article_id = get_queried_object_id(); //页面的ID
		$arr = get_post($article_id)->post_content;
	?>
	<div class="banner0">
			<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail(); ?>
			<?php } else {?>
			<img src="<?php bloginfo('template_url'); ?>/images/xxx.jpg" />
			<?php } ?>
	</div>	
	<div class="er_wen">
		<div class="mbxie"><?php get_breadcrumbs(); ?></div>
		<div class="er_wenzi"><?php echo $arr ?></div>
	</div>
</div>
<script>
	$('.er_wen_pic').css('height',$('.er_wen_pic').width()*0.57);
	$('.er_right_div').css('height',$('.er_wen_pic').height());
	$('.er_left_nav').css('height',$('.er_wen_pic').height());
	$('.cenav>li').wrap('<div class="nav_bg"></div>');
	$('.nav_bg').css('height',$('.er_left_nav').height()*0.17);
	$('.nav_bg').css('lineHeight',$('.nav_bg').height()+'px');
	$('.nav_bg:first').css('margin-top',0);
	$('.ban_qiu').css('height',$(window).width()*20/1920+'px');
	$('.ban_qiu').css('width',$(window).width()*20/1920+'px');
	// $('.nav_bg>li').each(function(){$(this).wrap('<a href="'+$(this).children().attr('href')+'"></a>')});
	$('.nav_bg').each(function(i){$(this).click(function(){$(this).css('background','url(http://localhost/wordpress/wp-content/uploads/2017/01/hei.png) 0 0 no-repeat').children().children().children().css('color','#fff').parent().parent().parent().siblings().css('background','url(http://localhost/wordpress/wp-content/uploads/2017/01/bai.png) 0 0 no-repeat').children().children().children().css('color','#000')})});
</script>
<?php get_footer();