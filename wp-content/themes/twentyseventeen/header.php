<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link id="favicon" href="http://<?php echo $_SERVER['SERVER_NAME']?>/wordpress/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/demo.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style_common.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style1.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.animate-colors-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-SliderPlay-1.0.js"></script>
<?php wp_head(); ?>
<style>
	*{margin:0;padding:0;}
	.menu-image-title{font-family:verdana; word-spacing:8px; letter-spacing: 2px !important;}
	img{border:0px;margin:0px;}
	ul li{list-style-type:none;}
	a{text-decoration:none;}
	.mynav{width: 100%;background: rgba(255,255,255,0.1);position: fixed;z-index: 1000;}
	.logo{width: 28%;height: 100%;float: left;}
	.ulnav{width: 57%;height: 100%;background: ;float: left;}
	.logo a img{float: right;margin: 1% 23% 1% 1%;height: 80%}
	.menu{width: 100%;}
	.menu>li{width: 20%; height: 100%;float: left;text-align: center;position: relative;background: }
	.menu li a{color: #fff;}
	.sub-menu{width: 100%;height: 100%;position: absolute;z-index: 10;top: 92%;right:0px;display: none;padding-top: 3px;}
	.sub-menu li{height: 100%;text-align: center;background:rgba(7,126,237,0.4);}
	.active{display: block;}
	.btm1{width: 4.3%;height: 3px;background: #fff;position: absolute;bottom: 0px;left: -300px;}
	.menu-item a img {
    box-shadow: none;
    float: left;
    margin: 10% -100% 9% 12%;
    vertical-align: middle;
    width: auto;}
	.ench{width: 15%;height: 100%;float: right;text-align: center;}
	.ench a{color:#fff;}
	.user{width: 100%;height: 40px;background: #000;z-index: 1000;position:fixed;line-height: 40px;}
	.menu li:hover ul{display:block}
</style>
</head>
<body <?php body_class(); ?>>
<?php 
	global $wpdb;
	$table_link = $wpdb->prefix . "links";
	$sql="SELECT link_url,link_name,link_image FROM $table_link WHERE link_notes='logo'";
	$logo=$wpdb->get_row($sql);
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="mynav">	
			<div class="logo"><a href="<?php echo $logo->link_url?>"><img src="<?php echo $logo->link_image?>" alt="<?php echo $logo->link_name?>" width="" height="100%"></a></div>
			<?php wp_nav_menu(array('container_class' => 'ulnav',)); ?>
			<div class="btm1"></div>
			<div class="ench"><a href="">中&nbsp;|&nbsp;En</a></div>
		</div>
	</header><!-- #masthead -->
	<!-- <div class="site-content-contain">
		<div id="content" class="site-content"> -->
<script>
	$('.menu-item>a>img').css('height','40%');
	$('.menu>li>a').each(function(i){
	 	$(this).prepend('<div class="btm"></div>');
	 });
	$('.menu>li').mouseenter(function(){
		$('.btm1').show();
		$('.btm1').stop().animate({left:$(this).children().offset().left},300);
	}).mouseleave
	// $('.menu>li>a').mouseenter(function(){
	// 		//$(this).children('div').show();
	// 		//$(this).animate({top:50,opacity:"show"},300);
	// 		$('.btm1').show();
	// 		$('.btm1').stop().animate({left:$(this).offset().left},300);
	// 		$(this).next().show();
	// 	}).mouseout(function(){timmer=setTimeout("$('.menu>li>a').next().hide()",50)});
	// $('.menu').mouseleave(function(){
	// 	timmer1=setTimeout("$('.btm1').hide()",50);
	// });
	// $('.sub-menu').mouseover(function(){
	// 		clearTimeout(timmer);
	// 		clearTimeout(timmer1);
	// 		$('.btm1').show();
	// 		$('.btm1').stop().animate({left:$(this).prev().offset().left},300);
	// 		$(this).attr('style','display:block');
	// 	}).mouseleave(function(){
	// 		$(this).hide();
	// 		$('.btm1').hide();
	// 	});
	$('.sub-menu>li').mouseover(function(){
		$(this).attr('style','background:rgba(7,126,237,0.6)');
	}).mouseout(function(){
		$(this).attr('style','background:rgba(7,126,237,0.4)')
	})
	
</script>
