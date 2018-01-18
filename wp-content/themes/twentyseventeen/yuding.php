<?php 
/*
Template Name:预定

 */
get_header();
global $wpdb;
$tab_post=$wpdb->prefix . "posts";
$sql="SELECT guid from $tab_post where post_excerpt='car'";
$car=$wpdb->get_row($sql);
 ?>
<style>
    body{background: #F1EEE6;}
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
    .banner0{width: 100%;position: relative;padding:0px;margin-bottom:-5px; }
    .banner0 img{width: 100%;}
    .mbxie{width: 80%;float: right;height: 80px;line-height: 80px;}
    .mynav{top:40px;}
    .user p{color:#fff;float: right;margin-right: 10%;}
    .user p a{color:#fff;}
    .probg{width: 100%;background: #F1EEE6;}
    .tab_bar{width: 100%;background: #fff;}
    .tab_cate{width: 60%;height: 100%;margin: 0 auto;}
    .tab_name{display: block;float: left;width: 33.3%;height: 100%;text-align: center;line-height:100px;}
    .tab_pic{float: left;}
    .tab_word{text-align: center;overflow: show;float: left;letter-spacing: 2px}
    .pro{width: 60%;margin:0 auto;}
    .pro_first{width: 100%;position: relative;}
    .pro_all{width: 49.5%;display: block;float: left;position: relative;}
    .bottom_bar{width: 100%;background: rgba(0,0,0,0.5);position: absolute;bottom: 0px;}
    .bar_left{height:100%;background: ;float: left;color:#fff;padding: 3px 20px;letter-spacing: 1px;overflow: hidden; }
    .bar_all_left{height:100%;background: ;float: left;color:#fff;padding: 4px 20px;letter-spacing: 1px; }
    .bar_mid{height: 80%;background: #fff;width: 1px;float: left;}
    .bar_right{height: 100%;background: ;float: left;color:#fff;}
    .bar_all_right{height: 100%;background: ;float: right;color:#fff;position: relative;}
    .back{background: #F1EEE6;}
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
    <div class="probg">
        <div class="tab_bar">
            <ul class="tab_cate">
                <?php 
                    global $wpdb;
                    $tab_cate=$wpdb->prefix . "cate";
                    $tab_goods=$wpdb->prefix . "goods"; 
                    $tab_image=$wpdb->prefix . "image";
                    $sql="SELECT id,name,cateimg from $tab_cate";
                    $res=$wpdb->get_results($sql);
                    if($res){
                        foreach($res as $val){
                ?>
                <li class="tab_name" id="cate<?php echo $val->id?>">
                    <div class="tab_pic" style="background: url('<?php echo $val->cateimg?>');background-size: cover;"></div>
                    <div class="tab_word"><?php echo $val->name?></div>
                </li>
                <?php } }?>
            </ul> 
        </div>
        <?php foreach($res as $cateval){?>
        <div style="clear:both"></div>
        <ul class="pro" style="display: block;" id="pro<?php echo $cateval->id?>">
            <?php 
                $cid=$cateval->id;
                $sqlall="SELECT g.name gname,g.id gid,g.price,i.imgurl FROM $tab_image i,$tab_goods g,$tab_cate c WHERE g.id=i.goods_id AND c.id=g.cate_id AND c.id=$cid AND g.first=0 ORDER BY g.ord";
                $resall=$wpdb->get_results($sqlall);
                $sqlfir="SELECT g.name gname,g.id gid,g.price,g.describe,i.imgurl FROM $tab_image i,$tab_goods g,$tab_cate c WHERE g.id=i.goods_id AND c.id=g.cate_id AND c.id=$cid AND g.first=1";
                $resfir=$wpdb->get_row($sqlfir);
            ?>
            <li class="pro_first mbottom">
                <img src="<?php echo $resfir->imgurl?>" alt="" class="pro_img">
                <div class="bottom_bar">
                    <div class="bar_left bar_first">
                        <?php echo $resfir->describe?>
                    </div>
                    <div class="bar_mid"></div>
                    <div class="bar_right">
                        票价&nbsp;:&nbsp;&yen;&nbsp;<?php echo $resfir->price?>
                        <a href="./proinfo.php?gid=<?php echo $resfir->gid?>"><img src="<?php echo $car->guid?>" alt="" style="position: absolute;" class="car"></a>
                    </div>
                </div>
            </li>
            <?php if($resall){ ?>
            <?php foreach($resall as $val){ ?>
            <li class="pro_all mbottom">
                <img src="<?php echo $val->imgurl?>" alt="" class="pro_img">
                <div class="bottom_bar">
                    <div class="bar_all_left"><?php echo $val->gname?></div>
                    <div class="bar_all_right">
                        票价&nbsp;&nbsp;:&nbsp;&nbsp;&yen;&nbsp;<?php echo $val->price?>
                        <a href=""><img src="<?php echo $car->guid?>" alt="" style="position: absolute;" class="car"></a>
                    </div>
                </div>
            </li>
            <?php } } ?>
        </ul>
        <?php }?>
    </div>
</div>
<div style="clear:both"></div>
<script>
   
    $('.tab_bar').css('height',$(window).width()*0.067+'px');
    $('.tab_pic').each(function(){
        $(this).css({width:$(this).parent().height()*0.8+'px',height:$('.tab_pic').parent().height()*0.8+'px',marginTop:$('.tab_pic').parent().height()*0.1+'px',marginLeft:$('.tab_pic').parent().width()*0.2+'px'})
    });
    $('.tab_word').css({height:$('.tab_pic').parent().height()*0.4+'px',marginTop:$('.tab_pic').parent().height()*0.3+'px',marginLeft:$('.tab_pic').parent().width()*0.06+'px',lineHeight:$('.tab_pic').parent().height()*0.4+'px'});
    $('.pro_first').each(function(){
        $(this).css('height',$(this).width()*0.47+'px');
    });
    $('.mbottom').css('marginBottom',$('.pro').width()*0.01+'px');
    $('.pro_all').each(function(){
        $(this).css('height',$(this).width()*0.55+'px');
        if($(this).index()%2==0){
            $(this).css('float','right');
        }else{
            $(this).css('float','left');
        }
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
    $('.tab_name').click(function(){
        $(this).addClass('back').siblings().removeClass('back');var num=$(this).index();
        $('.pro').eq(num).css('display','block').siblings('ul').css('display','none');
    });
     $('#cate<?php echo $_GET['action']?>').addClass('back');
    $('#pro<?php echo $_GET['action']?>').siblings('.pro').css('display','none');
    $('.car').click(function(){
        $(this).parent().attr('onclick','return false');
        alert('预定功能暂未开通');
    });
    $('.user>p a').each(function(){
        $(this).click(function(){
            alert('该功能暂未开通');
            return false;
        }); 
    });
</script>
<?php get_footer();