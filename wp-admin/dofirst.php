<?php 
	require_once(dirname(dirname(__FILE__)) . '/wp-load.php');
	$cid=$_GET['cid'];
	$gid=$_GET['gid'];
	global $wpdb;
	$tab_cate=$wpdb->prefix . "cate";
	$tab_goods=$wpdb->prefix . "goods";
	$wpdb->update($tab_goods,array('first'=>0),array('cate_id'=>$cid));
	$res=$wpdb->update($tab_goods,array('first'=>1),array('id'=>$gid));
	if($res){
		echo "<script>window.location.href='admin.php?page=product';</script>";
	}else{
		echo "<script>alert('修改失败');window.location.href='admin.php?page=product;</script>";
	}