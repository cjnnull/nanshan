<?php 
	require_once(dirname(dirname(__FILE__)) . '/wp-load.php');
	//var_dump($_POST);
	global $wpdb;
	$tab_cate=$wpdb->prefix . "cate";
	$tab_goods=$wpdb->prefix . "goods";
	$tab_image=$wpdb->prefix . "image";
	$gid=$_POST['gid'];
	$unurl=$_POST['unurl'];
	$sql="SELECT name,price,stock,cate_id,ord,remark,`describe` FROM $tab_goods WHERE id=$gid";
	$old=$wpdb->get_row($sql,ARRAY_A);
	$goods=array_slice($_POST,0,7);
	if($old==$goods){
		$meta=1;
	}else{
		$meta=0;
	}
	if($_FILES['pic']['name']!==''){
		$path=uploadimg('pic');
	    if(!$path){
	        echo "<script>alert('图片上传失败');window.location.href='admin.php?page=editpropage&gid=$gid';</script>";
	    }else{
	    	$path=explode('+',$path);
	        $path0=$path[0];
	        $path1=$path[1];
	        $resimg=$wpdb->update($tab_image,array('imgurl'=>$path0,'unurl'=>$path1),array('goods_id'=>$gid));
	        if($resimg){
	        	@unlink($unurl);
	            $res=$wpdb->update($tab_goods,$goods,array('id'=>$gid));
	            if($res||$meta){
	                echo "<script>alert('修改成功');window.location.href='admin.php?page=product';</script>";
	            }
	            else{
	                echo "<script>alert('修改失败');window.location.href='admin.php?page=editpropage&gid=$gid';</script>";    
	            }
        	}else{
        		echo "<script>alert('修改失aa败');window.location.href='admin.php?page=editpropage&gid=$gid';</script>";
        	}
    	}
	}else{
		$res=$wpdb->update($tab_goods,$goods,array('id'=>$gid));
	            if($res||$meta){
	                echo "<script>alert('修改成功');window.location.href='admin.php?page=product';</script>";
	            }
	            else{
	                echo "<script>alert('修改失败');window.location.href='admin.php?page=editpropage&gid=$gid';</script>";    
	            }
	}
?>