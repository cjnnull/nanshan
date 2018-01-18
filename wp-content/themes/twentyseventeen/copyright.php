<?php      
function cpright_function(){   
    add_theme_page( '自定义设置', '自定义设置', 'administrator', 'cpright','showcp_function');   
}   
add_action('admin_menu', 'cpright_function');   
  
function showcp_function(){ ?>   
    <form method="post" name="cp_form" id="cp_form" action="options.php">   
    <h2>版权部分设置</h2>   
    <p>   
    <label>   
    <input name="cp_right" size="80" value="<?php echo get_option('cp_right'); ?>"/>   
    请输入版权  
    </label>   
    </p>   
    <p>   
    <label>   
    <input name="cp_add" size="80" value="<?php echo get_option('cp_add'); ?>"/>   
    请输入通信地址  
    </label>   
    </p>  
    <p>   
    <label>   
    <input name="cp_postal" size="80" value="<?php echo get_option('cp_postal'); ?>"/>   
    请输入与邮编  
    </label>   
    </p>  
    <p>   
    <label>   
    <input name="cp_email" size="80" value="<?php echo get_option('cp_email'); ?>"/>   
    请输入Email  
    </label>   
    </p>  
    <p>   
    <label>   
    <input size="80" name="cp_en" value="<?php echo get_option('cp_en'); ?>"/>   
    请输入英文版权
    </label>   
    </p>  
    <p>   
    <label>   
    <input size="80" name="cp_norm" value="<?php echo get_option('cp_norm'); ?>"/>   
    请输入旅游标准化
    </label>   
    </p>  
    <?php wp_nonce_field('update-options'); ?>   
    <input type="hidden" name="action" value="update" />   
    <input type="hidden" name="page_options" value="ashu_copy_right,cp_right,cp_add,cp_postal,cp_email,cp_en,cp_norm" />   
    <p class="submit">   
        <input type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form>   
    <form method="post" name="ashu_form" id="ashu_form" action="options.php">   
    <h2>悬浮窗标题设置</h2>   
    <p>   
    <label>   
    <input name="my_link" size="40" value="<?php echo get_option('my_link'); ?>"/>   
    请输入悬浮窗标题   （悬浮窗更多精彩内容的链接请到 <b>链接</b> 菜单中设置）
    </label>   
    </p>   
    <?php wp_nonce_field('update-options'); ?>   
    <input type="hidden" name="action" value="update" />   
    <input type="hidden" name="page_options" value="ashu_copy_right,my_link" />   
    <p class="submit">   
        <input type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form> 
    <form method="post" name="ashu_form" id="ashu_form" action="options.php">   
    <h2>QQ号设置</h2>   
    <p>   
    <label>   
    <input name="qq_num" size="40" value="<?php echo get_option('qq_num'); ?>"/>   
    请输入qq号码 
    </label>   
    </p>   
    <?php wp_nonce_field('update-options'); ?>   
    <input type="hidden" name="action" value="update" />   
    <input type="hidden" name="page_options" value="ashu_copy_right,qq_num" />   
    <p class="submit">   
        <input type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form> 
<?php } ?> 
