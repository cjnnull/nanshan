<?php 
//商品列表
function producta(){      
    add_menu_page( '商品管理', '商品管理', 'edit_themes', 'product','showpro','',6);      
}      
       
function showpro(){  
global $wpdb;
$tab_cate=$wpdb->prefix . "cate";
$tab_goods=$wpdb->prefix . "goods"; 
$tab_image=$wpdb->prefix . "image"; 
$sql="SELECT c.name cname,c.id cid,g.name gname,g.ord,g.id gid,g.describe,g.remark,g.price,g.cate_id,g.first,g.stock,i.imgurl FROM $tab_image i,$tab_goods g,$tab_cate c WHERE g.id=i.goods_id AND c.id=g.cate_id ORDER BY c.id,g.first desc,g.ord";
$res=$wpdb->get_results($sql);
$URL['PHP_SELF'] = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);   //当前页面名称
$URL['DOMAIN'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];  //域名(主机名)
$URL['QUERY_STRING'] = $_SERVER['QUERY_STRING'];   //URL 参数
$myurl = "http://".$URL['DOMAIN'].$URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : ""); //完整URL地址
switch($_GET['action']){
    case 'del':
        $proid=$_GET['proid'];
        $sql="SELECT unurl FROM $tab_image WHERE goods_id=$proid";
        $arrimg=$wpdb->get_results($sql);
        if($arrimg){
            foreach($arrimg as $val){
                unlink("$val->unurl");
            }
            $res1=$wpdb->query("DELETE FROM $tab_image WHERE goods_id = $proid");
            if($res1){
                $res2=$wpdb->query("DELETE FROM $tab_goods WHERE id = $proid");
                if($res2){
                    echo "<script>location.replace(document.referrer);</script>";  
                }else{
                    echo "<script>alert('删除失败');location.replace(document.referrer);</script>";
                }
            }else{
                echo "<script>alert('删除失败');location.replace(document.referrer);</script>";
            }
        }else{
            echo "<script>alert('删除失败');location.replace(document.referrer);</script>";
        }
        
    break;
}
echo '<h3>商品列表</h3>';
    ?>
    <link href="./css/css.css" type="text/css" rel="stylesheet" />
    <link href="./css/main.css" type="text/css" rel="stylesheet" />
    <style>
    body{overflow-x:hidden; background:#f2f0f5;}
    #searchmain{ font-size:12px;}
    #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
    #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
    #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
    #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
    #search a.add{ background:url(../images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
    #search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
    #main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
    #main-tab th{ font-size:12px; background:rgba(0,0,0,0.24); height:32px; line-height:32px;}
    #main-tab td{ font-size:12px; line-height:40px;}
    #main-tab td a{ font-size:12px; color:#548fc9;}
    #main-tab td a:hover{color:#565656; text-decoration:underline;}
    .bordertop{ border-top:1px solid #ebebeb}
    .borderright{ border-right:1px solid #ebebeb}
    .borderbottom{ border-bottom:1px solid #ebebeb}
    .borderleft{ border-left:1px solid #ebebeb}
    .gray{ color:#dbdbdb;}
    td.fenye{ padding:10px 0 0 0; text-align:right;}
    .bggray{ background:#f9f9f9}
    </style>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" >
              <tr>
                <th align="center" valign="middle" class="borderright borderbottom">编号</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品名称</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品图片</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品分类</th>  
                <th align="center" valign="middle" class="borderright borderbottom">商品价格</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品库存</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品内容</th>
                <th align="center" valign="middle" class="borderright borderbottom">商品备注</th>
                <th align="center" valign="middle" class="borderbottom">操作</th>
              </tr>
              <?php foreach ($res as $val){ ?>
              <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#E7E7E5'">
                <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->ord?></td>
                <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->gname?></td>
                <td align="center" valign="middle" class="borderright borderbottom"><img src="<?php echo $val->imgurl?>" alt="" width="80px" height="50px"></td>
                <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->cname?></td>
                <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->price?></td>
                <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->stock?></td>
                <td align="center" valign="middle" class="borderright borderbottom" width="140px" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 150px;"><?php echo $val->describe?></td>
                <td align="center" valign="middle" class="borderright borderbottom" width="140px" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 150px;"><?php echo $val->remark?></td>
                <td align="center" valign="middle" class="borderright borderbottom"><a href="admin.php?page=editpropage&gid=<?php echo $val->gid?>">修改</a>&nbsp;|&nbsp;<a href="<?php echo $myurl.'&proid='.$val->gid.'&action=del'?>">删除</a>&nbsp;|&nbsp;<?php echo $val->first==0?'<a href="./dofirst.php?gid='.$val->gid.'&cid='.$val->cid.'">设为首个</a>':'首个'?></td>
              </tr>
              <?php }?>
            </table>
    <?php      
}      
add_action('admin_menu', 'producta');   
//以下是添加子菜单项代码   
add_action('admin_menu', 'addpro');   
add_action('admin_menu', 'catepro');   
add_action('admin_menu', 'catelist');   
add_action('admin_menu', 'editpro');   
add_action('admin_menu', 'editcate');
//添加商品
  
function addpro() {   
    //顶级菜单的slug是product 
    add_submenu_page( 'product', '添加商品', '添加商品', 'edit_themes', 'addpropage', 'showaddpro' );    
}   
  
function showaddpro() {  
global $wpdb;
$tab_cate=$wpdb->prefix . "cate";
$tab_goods=$wpdb->prefix . "goods";
$tab_image=$wpdb->prefix . "image";
$arr2=$wpdb->get_results( "SELECT id,name FROM $tab_cate" );
if(!empty($_FILES['pic']['name'])){
    $path=uploadimg('pic');
    $path=explode('+',$path);
    if(!$path){
        echo '图片上传失败点击<a href="">重新上传</a>';exit;
    }else{
        $path0=$path[0];
        $path1=$path[1];
        $arr3=$_POST;
        $arr3['id']='null';
        $wpdb->insert($tab_goods,$arr3);
        $goods_id=$wpdb->insert_id;
        $arr4=array('id'=>'null','imgurl'=>$path0,'goods_id'=>$goods_id,'is_face'=>1,'unurl'=>$path1);
        if($goods_id){
            $res=$wpdb->insert($tab_image,$arr4);
            if($res){
                echo '添加成功，<a href="" style="font-size:15px;">继续添加</a>或跳转到<a href="'.admin_url().'admin.php?page=product">商品列表</a>';exit;
               // header('Location:'.admin_url().'admin.php?page=product');exit;
            }
            else{
                echo '添加失败点击<a href="">重新上传</a>';exit;
                
            }
        }
    }
} 


 ?>
<form method="post" name="addpro" id="addpro" enctype="multipart/form-data" action="">   
    <h2>添加商品</h2>   
    <p>   
    <label> 
    请输入商品名<br/>  
    <input name="name" size="40" value=""/>    
    </label>   
    </p>  
    <p>   
    <label> 
    请输入商品价钱<br/>  
    <input name="price" value="" />    
    </label>   
    </p>  
    <p>   
    <label> 
    请输入商品库存<br/>  
    <input name="stock" value="" />    
    </label>   
    </p>
    <p>   
    <label> 
    选择商品图片<br/>  
    <input name="pic" type="file" value=""/>    
    </label>   
    </p> 
    商品类别<br/>
    <select name="cate_id">  
    <?php foreach($arr2 as $val){ ?>
      <option value ="<?php echo $val->id?>"><?php echo $val->name?></option>
    <?php }?>    
    </select> 
    <p>   
    <label> 
    请输入序号<br/>  
    <input name="ord" type="number" />    
    </label>   
    </p>
    <p>   
    <label> 
    商品描述<br/>  
    <textarea name="describe" cols="30" rows="4"></textarea>   
    </label>   
    </p>
    <p>   
    <label> 
    商品备注<br/>  
    <textarea name="remark" cols="30" rows="4"></textarea>   
    </label>   
    </p>   
    <p class="submit">   
        <input type="submit" name="" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form>  
       
<?php  }   ?>  

<?php
/******************************修改商品begin*****************************************/
function editpro() {   
    //顶级菜单的slug是product 
    add_submenu_page( 'product', '修改商品', '修改商品', 'edit_themes', 'editpropage', 'showeditpro' );    
}   
  
function showeditpro() {  
global $wpdb;
$tab_cate=$wpdb->prefix . "cate";
$tab_goods=$wpdb->prefix . "goods";
$tab_image=$wpdb->prefix . "image";
$arr2=$wpdb->get_results( "SELECT id,name FROM $tab_cate" );
$gid=$_GET['gid'];
$sql="SELECT c.name cname,g.name gname,g.id gid,g.describe,g.remark,g.ord,g.price,g.cate_id,g.stock,i.imgurl,i.unurl FROM $tab_image i,$tab_goods g,$tab_cate c WHERE g.id=$gid AND i.goods_id=$gid AND c.id=g.cate_id";
$return=$wpdb->get_row($sql);
 ?>
<form method="post" name="addpro" id="addpro" enctype="multipart/form-data" action="./dopro.php">   
    <h2>修改商品</h2>   
    <p>   
    <label> 
    请输入商品名<br/>  
    <input name="name" size="40" value="<?php echo $return->gname?>"/>    
    </label>   
    </p>  
    <p>   
    <label> 
    请输入商品价钱<br/>  
    <input name="price" value="<?php echo $return->price?>" />    
    </label>   
    </p>  
    <p>   
    <label> 
    请输入商品库存<br/>  
    <input name="stock" value="<?php echo $return->stock?>" />    
    </label>   
    </p>
    <p>   
    <label> 
    选择商品图片<br/>  
    <input name="pic" type="file"/>    
    </label>   
    </p> 
    商品类别<br/>
    <select name="cate_id">  
    <?php foreach($arr2 as $val){ ?>
      <option value ="<?php echo $val->id?>"<?php echo $val->id==$return->cate_id?'selected':'';?>><?php echo $val->name?></option>
    <?php }?>    
    </select> 
    <p>   
    <label> 
    请输入序号<br/>  
    <input name="ord" type="number" value="<?php echo $return->ord?>"/>    
    </label>   
    </p>
    <p>   
    <label> 
    商品描述<br/>  
    <textarea name="describe" cols="30" rows="4"><?php echo $return->describe?></textarea>   
    </label>   
    </p>
    <p>   
    <label> 
    商品备注<br/>  
    <textarea name="remark" cols="30" rows="4"><?php echo $return->remark?></textarea>   
    </label>   
    </p>   
    <p class="submit">   
        <input type="hidden" name="gid" value="<?php echo $gid ?>" />   
        <input type="hidden" name="unurl" value="<?php echo $return->unurl ?>" />   
        <input type="submit" name="" value="<?php _e('确认修改'); ?>" />   
    </p>    
    </form>  
       
<?php  }   ?> 

<?php 

/**************************************添加分类begin******************************/
function catepro() {   
    //顶级菜单的slug是product 
    add_submenu_page( 'product', '添加分类', '添加分类', 'edit_themes', 'catepropage', 'showcatepro' );    
}  

function showcatepro() {  
$action=$_POST['action'];
switch ($action){
    case'addcate':
    if($_POST['catename']==''||$_FILES['cateimg']['name']==''){
        echo '请填写分类名称并选择分类图片<a href="'.admin_url().'admin.php?page=catepropage">点击返回</a>';exit;
    }else{
        $path=uploadimg('cateimg');
        $path=explode('+',$path);
        if(!$path){
            echo '图片上传失败点击<a href="">重新上传</a>';exit;
        }else{
            $path0=$path[0];
            $path1=$path[1];
            $catename=$_POST['catename'];
            global $wpdb;
            $table_name = $wpdb->prefix . "cate";
            $catearr=array('id'=>'null','name'=>$catename,'display'=>1,'cateimg'=>$path0,'delurl'=>$path1);
            $res=$wpdb->insert($table_name,$catearr);
            if($res){
                echo '添加成功，<a href="" style="font-size:15px;">继续添加</a>或跳转到<a href="'.admin_url().'admin.php?page=catelistpage">分类列表</a>';exit;
            }else{
                echo '添加失败点击<a href="">重新上传</a>';exit;
            }
        }
    }
    break;
}
 ?>

<form method="post" name="catepro" id="catepro" enctype="multipart/form-data" action="">   
    <h2>添加分类</h2>   
    <p>   
    <label>   
    请输入分类名: <br/>
    <input type="text" name="catename"/><br/> <br/> 
    <input type="hidden" name="action" value="addcate"/>   
    请选择分类图片:<br>
    <input type="file" name="cateimg"/>
    </label>   
    </p>  
    <p class="submit">   
        <input type="submit" name="" value="<?php _e('确认添加'); ?>" />   
    </p>    
    </form>  
       
<?php  }   ?>  




<?php 

/************************************分类列表begin**********************************/
function catelist() {   
    //顶级菜单的slug是product 
    add_submenu_page( 'product', '分类列表', '分类列表', 'edit_themes', 'catelistpage', 'showcatelist' );    
}  

function showcatelist() {  
echo '<h3>分类列表</h3>';
global $wpdb;
$table_name=$wpdb->prefix . "cate";
$arr1=$wpdb->get_results( "SELECT id,name,cateimg,delurl FROM $table_name" );
$i=1;
$URL['PHP_SELF'] = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);   //当前页面名称
$URL['DOMAIN'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];  //域名(主机名)
$URL['QUERY_STRING'] = $_SERVER['QUERY_STRING'];   //URL 参数
$myurl = "http://".$URL['DOMAIN'].$URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : ""); //完整URL地址
$cateid=$_GET['cateid'];
$dbname=$wpdb->prefix . "cate";
switch($_GET['action']){
    case 'del':
        $res=$wpdb->query("DELETE FROM $dbname WHERE id = $cateid");
        if($res){
            @unlink($_GET['delurl']);
            echo "<script>location.replace(document.referrer);</script>";  
        }else{
            echo "<script>alert('删除失败')</script>";
        }
}
 ?>
    <link href="./css/css.css" type="text/css" rel="stylesheet" />
    <link href="./css/main.css" type="text/css" rel="stylesheet" />
    <style>
    body{overflow-x:hidden; background:#f2f0f5;}
    #searchmain{ font-size:12px;}
    #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
    #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
    #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
    #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
    #search a.add{ background:url(../images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
    #search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
    #main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
    #main-tab th{ font-size:12px; background:rgba(0,0,0,0.24); height:32px; line-height:32px;}
    #main-tab td{ font-size:12px; line-height:40px;}
    #main-tab td a{ font-size:12px; color:#548fc9;}
    #main-tab td a:hover{color:#565656; text-decoration:underline;}
    .bordertop{ border-top:1px solid #ebebeb}
    .borderright{ border-right:1px solid #ebebeb}
    .borderbottom{ border-bottom:1px solid #ebebeb}
    .borderleft{ border-left:1px solid #ebebeb}
    .gray{ color:#dbdbdb;}
    td.fenye{ padding:10px 0 0 0; text-align:right;}
    .bggray{ background:#f9f9f9}
    </style>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" style="margin: 20px;">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#E7E7E5'">
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">分类名称</th>
        <th align="center" valign="middle" class="borderright">分类图片</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      <?php foreach( $arr1 as $val){?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#E7E7E5'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $i++?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $val->name?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src="<?php echo $val->cateimg?>" alt="" width="80px" height="50px"></td>
        <td align="center" valign="middle" class="borderbottom"><a href="admin.php?page=editcate&cateid=<?php echo $val->id?>&action=edit">修改</a>|<a href="<?php echo $myurl.'&cateid='.$val->id.'&action=del&delurl='.$val->delurl?>">删除</a></td>
      </tr>
      <?php }?>
    </table>
    
<?php  }   ?>  

<?php 
/**********************************修改分类************************************************/

function editcate() {   
    //顶级菜单的slug是product 
    add_submenu_page( 'product', '修改分类', '修改分类', 'edit_themes', 'editcate', 'showeditcate' );    
}  

function showeditcate() {   
if(!isset($_GET['cateid'])){
    echo "<script>alert('没有选择分类名！！请通过分类列表的修改处修改');</script>";
}else{
    global $wpdb;
    $cid=$_GET['cateid'];
    $tab_cate=$wpdb->prefix . "cate";
    $sql="SELECT name,delurl FROM $tab_cate WHERE id=$cid";
    $res=$wpdb->get_row($sql);
    if(!empty($_POST)&&$_FILES['cateimg']['name']!==''){
        $name=$_POST['catename'];
        $path=uploadimg('cateimg');
        $path=explode('+',$path);
        if(!$path){
            echo '图片上传失败点击<a href="">重新上传</a>';exit;
        }else{
            $path0=$path[0];
            $path1=$path[1];
        }
        $res1=$wpdb->update($tab_cate,array('name'=>$name,'cateimg'=>$path0,'delurl'=>$path1),array('id'=>$cid));
        if($res1){
            @unlink($res->delurl);
            echo "<script>window.location.href='admin.php?page=catelistpage'</script>";
        }
    }elseif(!empty($_POST)&&$_FILES['cateimg']['name']==''){
        $name=$_POST['catename'];
        $res1=$wpdb->update($tab_cate,array('name'=>$name),array('id'=>$cid));
        if($res1){
            echo "<script>window.location.href='admin.php?page=catelistpage'</script>";
        }
    }
}
    ?>
<form method="post" name="editcate" id="catepro" enctype="multipart/form-data" action="">   
    <h2>修改分类</h2>   
    <p>   
    <label>   
    <input name="catename" size="40" value="<?php echo $res->name?>"/>    
    请输入分类名 
    </label>   
    </p>  
    <p>   
    <label>   
    <input type="file" name="cateimg"/>    
    修改分类图片
    </label>   
    </p>  
    <p class="submit">   
        <input type="submit" name="" value="<?php _e('确认修改'); ?>" />   
    </p>    
    </form>  
       
<?php  }   ?>  
