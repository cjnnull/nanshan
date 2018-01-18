<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 
$localhost = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
global $wpdb;
$tab_post=$wpdb->prefix . "posts";
$sql="SELECT guid from $tab_post where post_excerpt='travelbg'";
$travelbg=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='touming'";
$touming=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='youji'";
$youji=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='winoff'";
$winoff=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='winpic'";
$winpic=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='winbg'";
$winbg=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='bannerdown'";
$bannerdown=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='nshot'";
$nshot=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='quan'";
$quan=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='fo'";
$fo=$wpdb->get_row($sql);
$sql="SELECT guid from $tab_post where post_excerpt='saying'";
$saying=$wpdb->get_row($sql);
?>
<style>
.sliderPlay {
            width: 100%;
            height: 770px;
            position: relative;
            overflow: hidden;
        }

        .slider {
            position: absolute;
            height: 100%;
            left: 0;
            top: 0;
            width: 100%;
        }

        .slider li {
            float: left;
            list-style-type: none;
            height: 100%;
            width: 100%;
        }

        .slider img {
            border: 0;
            width: 100%;
            height: 100%;
        }

        .btnBox {
            position: absolute;
            left: 20px;
            width: 10px;
            top: 40%;
        }

        .btnBox .btn {
            margin: 20px;
            display: block;
            width: 6px;
            height: 6px;
            border: 1px solid white;
            cursor: pointer;
            border-radius: 7px;
        }

        .btnBox .cur {
            background: white;
        }

        .arrow-next {
            width: 100%;
            position: absolute;
            bottom: 150px;
            height: 50px;
            text-align: center;
            cursor: pointer;
        }
.hot{clear:both;width: 100%;background: rgba(255,255,255,0.5);position: absolute; z-index: 3;}
.hotdiv{height: 55%;text-align:center;margin: 2% 2% 0 2%;position: relative;}
.tradiv{height: 55%;text-align:center;margin-bottom: 2%;position: relative;}
.hotimg{height: 90%;position: absolute;top:0;left: 46%;z-index: 2}
.zhuan{height: 90%;position: absolute;top:0;left: 46%;z-index: 1}
.ding{height: 90%;position: absolute;top:25%;left: 47%;z-index: 1}
.middle{width: 65%;margin: 0 auto;}
.midimg{width: 33.3333%;height: 50%;float: left;overflow: hidden;}
.travel{width: 100%;background: url(<?php echo $travelbg->guid?>);z-index: 3;position: relative;}
.traimg{height: 90%;position: absolute;top:2%;left: 45%;z-index: 2}
.view {
        border: 0;
        box-shadow: 1px 1px 2px #e6e6e6;
        cursor: default;
        float: left;
        height: 50%;
        margin: 0 auto;			
        overflow: hidden;
        position: relative;
        text-align: center;
        width: 33.3333%;
       
}
.hotimg,.traimg{
	margin: 0 auto;
	/*background: no-repeat url("images/author.jpg") left top;*/
	-webkit-background-size: 220px 220px;
	-moz-background-size: 220px 220px;
	background-size: 220px 220px;
	-webkit-border-radius: 110px;
	border-radius: 110px;
	-webkit-transition: -webkit-transform 2s ease-out;
	-moz-transition: -moz-transform 2s ease-out;
	-o-transition: -o-transform 2s ease-out;
	-ms-transition: -ms-transform 2s ease-out;
}
.hotimg:hover,.traimg:hover{
	-webkit-transform: rotateZ(360deg);
	-moz-transform: rotateZ(360deg);
	-o-transform: rotateZ(360deg);
	-ms-transform: rotateZ(360deg);
	transform: rotateZ(360deg);
}
.hotfont{height: 80%;width: 50px;position: absolute;top:10px;left: 50%;}
.mingyan{width: 100%;height: 20%;text-align: center;}
.traimg{margin: 2%}
.fiveimg{width:100%;margin: 0;padding: 0;position: relative;}
.five_imgall{width: 20%;height: 100%;margin: 0;padding: 0;position: absolute;z-index: 3;overflow: hidden;}
.inimg{height:110%;width:120%;border: 0;}
.five_0img0{top:0px;left: 0}
.five_0img1{top:0px;left: 20%}
.five_0img2{top:0px;left: 40%}
.five_0img3{top:0px;left: 60%}
.five_0img4{top:0px;left: 80%}
.zind{z-index: 4}
.five_img0{width:24%;height: 110%; top:-5%;left:0;z-index: 4}
.five_img1{width:24%;height: 110%; top:-5%;left:18%;background: green;z-index: 4}
.five_img2{width:24%;height: 110%; top:-5%;left:38%;background: green;z-index: 4}
.five_img3{width:24%;height: 110%; top:-5%;left:58%;background: green;z-index: 4}
.five_img4{width:24%;height: 110%; top:-5%;left:76%;background: green;z-index: 4}
.box-shadow-1{  
      -webkit-box-shadow: 3px 3px 3px #555;  
      -moz-box-shadow: 3px 3px 3px #555;  
      box-shadow: 3px 3px 3px #555;  
    } 
.down_link{width: 100%;height: 15%;background:url(<?php echo $touming->guid?>) no-repeat 0px 0px;position: absolute;bottom:0;z-index: 4;text-align:center;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.qq{background: url(<?php echo $fo->guid?>);background-size: cover; -moz-background-size: cover;position: fixed;z-index: 1000;bottom: 120px !important;left: 0px;}
.kefu{width: 100px;height: 28px;text-align: center;line-height: 28px;position: fixed;z-index: 100;bottom: 120px;left: 150px;border-bottom: 1px solid #fff;}
.kefu a{color: #fff;}
.right_k{position: fixed;z-index: 100;bottom: 120px;right: 10px;background: url(<?php echo $winbg->guid?>);background-size: cover; -moz-background-size: cover;}
.blue_hui{width: 80%;height: 15%;background: #01abfb;margin-top: 1%;margin-left: 10%;line-height: 100%;text-align: center;}
.blue_hui span{color:#fff;font-size: 22px;font-weight: bold;}
.kefu_pic{width:90%; height: 50%;background:url(<?php echo $winpic->guid?>);background-size: cover; -moz-background-size: cover;margin-left: 5%;margin-top: 3%;}
.kfoff{position: absolute;right: 0;border-radius: 40px;background: url(<?php echo $winoff->guid?>);background-size: cover; -moz-background-size: cover;}
.kfzi{position: absolute;border-bottom:1px solid #fff;text-align: center;width: 65%;right:15%;color:#fff}
.waiq{position: absolute;background: rgba(255,255,255,0.5);left: 13%;border-radius: 40px;}
.neiq{position: absolute;background: rgba(255,255,255,0.8);left: 15%;border-radius: 40px;}

</style>
       
<div class="qq"></div>
<div class="kefu">
	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo get_option('qq_num');?>&site=qq&menu=yes">QQ在线客服</a>
</div>    
<div class="right_k">
	<div class="blue_hui"><span><?php echo get_option('my_link'); ?> </span></div>
	<div class="kefu_pic"></div>
	<a href="javascript:;"><div class="kfoff"></div></a>
	<?php 
			global $wpdb;
			$table_link = $wpdb->prefix . "links";
			$sql="SELECT link_url,link_name FROM $table_link WHERE link_notes='more'";
			$kflink=$wpdb->get_row($sql);
		?>
	<a href="<?php echo $kflink->link_url?>"><div class="kfzi"><?php echo $kflink->link_name?></div></a>
	<div class="waiq"></div>
	<div class="neiq"></div>
</div>    
<div class="content-area">
	<main id="main" class="site-main" role="main">
		<div class='sliderPlay' id='sliderPlay2'>
		    <ul class='slider'>
		    <?php 
			global $wpdb;
			$table_terms = $wpdb->prefix . "terms";
			$table_name = $wpdb->prefix . "term_relationships";
			$table_name2 = $wpdb->prefix . "posts";
			$cid=$wpdb->get_row("SELECT term_id FROM $table_terms WHERE slug='banner'");
			$ban = $wpdb->get_results( "SELECT object_id FROM $table_name where  term_taxonomy_id=$cid->term_id" );
			foreach($ban as $key=>$val){
				$arrban = $wpdb->get_row( "SELECT guid FROM $table_name2 where  id=".$val->object_id);?>
				<li><a href='javascript:;'><img src='<?php echo $arrban->guid?>'/></a></li>
			<?php } ?>
		    </ul>
		    <div id='btnBox2' class='btnBox'>
		       
		        <?php foreach($ban as $key=>$val){
		        	echo "<span class='btn'></span>";
		        	}?>
		        
		    </div>
		    <div class="arrow-next" id="arrow-next">
		        <img src="<?php echo $bannerdown->guid?>" width="40px" height="40px" />
		    </div>
		</div>
		<div class="hot">
			<!-- <div class="hotfont">fasdf</div> -->
			<div class="hotdiv"><img src="<?php echo $quan->guid?>" alt="" class="hotimg"><img class="zhuan"src="<?php echo $nshot->guid?>" alt=""></div>
			<div class="mingyan"><img src="<?php echo $saying->guid?>" alt="" style="width: 30%"></div>
		</div>
		<div class="middle">
		<?php 
			global $wpdb;
			$table_name = $wpdb->prefix . "term_relationships";
			$table_name2 = $wpdb->prefix . "posts";
			$table_terms = $wpdb->prefix . "terms";
			$cid=$wpdb->get_row("SELECT term_id FROM $table_terms WHERE slug='six'");
			$preg='/<a href="(.*?)"><\/a>/';
			$arr1 = $wpdb->get_results( "SELECT object_id FROM $table_name where  term_taxonomy_id=$cid->term_id" );
			foreach($arr1 as $key=>$val){
				$arr20[] = $wpdb->get_results( "SELECT guid,post_excerpt,post_content FROM $table_name2 where  ID=".$arr1[$key]->object_id);
				$strold=$arr20[$key][0]->post_content;
				$res=preg_match($preg,$strold,$strarr);
				$arr20[$key][0]->post_content=$strarr[1];

			}

		?>
			<?php if(!empty($arr20)){
//var_dump($arr20);exit;
				?>
			<?php foreach($arr20 as $val){?>
			<div class="view view-first"><a href="<?php echo $val[0]->post_content;?>"><img src="<?php echo $val[0]->guid;?>" style="height:100%"></a></div>
			<?php } }?>
		</div>
		<script type="text/javascript">
			$('.view').each(function(){
				if($(this).index()%2==1){
					$(this).children().attr('onclick','return false').css('cursor','auto');
				}
			})
		</script>
		<div class="travel">
			<div class="tradiv">
				<img src="<?php echo $quan->guid?>" alt="" class="traimg"><img src="<?php echo $youji->guid?>" alt="" class="ding">
			</div>
			<div class="mingyan"><img src="<?php echo $saying->guid?>" alt="" style="width: 30%"></div>
		</div>
		<?php 
			global $wpdb;
			$table_name = $wpdb->prefix . "term_relationships";
			$table_name2 = $wpdb->prefix . "posts";
			$table_terms = $wpdb->prefix . "terms";
			$cid=$wpdb->get_row("SELECT term_id FROM $table_terms WHERE slug='five'");
			$preg='/<a href="(.*?)"><\/a>/';
			$arr1 = $wpdb->get_results( "SELECT object_id FROM $table_name where  term_taxonomy_id=$cid->term_id" );
			foreach($arr1 as $key=>$val){
				$arr2[] = $wpdb->get_results( "SELECT guid,post_excerpt,post_content FROM $table_name2 where  ID=".$arr1[$key]->object_id);
				$strold=$arr2[$key][0]->post_content;
				$res=preg_match($preg,$strold,$strarr);
				$arr2[$key][0]->post_content=$strarr[1];
			}
		?>
		<div class="fiveimg">
			<div class="five_imgall five_0img0"><a href="<?php echo $arr2[0][0]->post_content?>"><img src="<?php echo $arr2[0][0]->guid?>" alt="" class="inimg"><div class="down_link"><?php echo $arr2[0][0]->post_excerpt?></div></a></div>
			<div class="five_imgall five_0img1"><a href="<?php echo $arr2[1][0]->post_content?>"><img src="<?php echo $arr2[1][0]->guid?>" alt="" class="inimg"><div class="down_link"><?php echo $arr2[1][0]->post_excerpt?></div></a></div>
			<div class="five_imgall five_0img2"><a href="<?php echo $arr2[2][0]->post_content?>"><img src="<?php echo $arr2[2][0]->guid?>" alt="" class="inimg"><div class="down_link"><?php echo $arr2[2][0]->post_excerpt?></div></a></div>
			<div class="five_imgall five_0img3"><a href="<?php echo $arr2[3][0]->post_content?>"><img src="<?php echo $arr2[3][0]->guid?>" alt="" class="inimg"><div class="down_link"><?php echo $arr2[3][0]->post_excerpt?></div></a></div>
			<div class="five_imgall five_0img4"><a href="<?php echo $arr2[4][0]->post_content?>"><img src="<?php echo $arr2[4][0]->guid?>" alt="" class="inimg"><div class="down_link"><?php echo $arr2[4][0]->post_excerpt?></div></a></div>
			
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<script>
$('.qq').css({width:$(window).width()*0.127,height:$(window).width()*0.115});
$(".kefu a").hover(function(){$(this).stop().animate({color:'#000'},200);$('html').fadeTo(500,0.9);},function(){$(this).stop().animate({color:'#fff'},200);$('html').fadeTo(500,1);});
$(".kfzi").hover(function(){$('html').fadeTo(500,0.9);},function(){$('html').fadeTo(500,1);});
$('.right_k').css('width',$(window).width()*0.15).css('height',$('.right_k').width()*0.75);
$('.kfoff').css('top',$('.right_k').height()*0.13).css({width:$('.right_k').height()*0.1,height:$('.right_k').height()*0.1}).click(function(){$(this).parent().parent().remove()});
$('.kfzi').css({bottom:$('.right_k').height()*0.13,height:$('.right_k').height()*0.15,fontSize:$('.right_k').height()*0.08+'px'});
$('.waiq').css({bottom:$('.right_k').height()*0.17,width:$('.right_k').height()*0.1,height:$('.right_k').height()*0.1});
$('.neiq').css({bottom:$('.right_k').height()*0.195,width:$('.right_k').height()*0.05,height:$('.right_k').height()*0.05});
setInterval(function(){ $(".waiq").fadeTo(600,0).fadeTo(600,0.8);},1200);
setInterval(function(){ $(".neiq").fadeTo(300,0.5).fadeTo(300,1);},600);
$('.blue_hui>span').css('fontSize',$('.blue_hui').height()-10+'px');
$('.blue_hui').css('lineHeight',$('.blue_hui').height()+'px');
</script>
<?php get_footer();


