

    <?php      
function xfc_function(){   
    add_theme_page( '悬浮窗标题', '悬浮窗标题', 'administrator', 'ashu_slug','showxfc_function');   
}   
add_action('admin_menu', 'xfc_function');   
  
function showxfc_function(){ ?>   
    <!-- <form method="post" name="ashu_form" id="ashu_form" action="options.php">   
    <h2>悬浮窗设置</h2>   
    <p>   
    <label>   
    <input name="my_link" size="40" value="<?php echo get_option('my_link'); ?>"/>   
    请输入悬浮窗标题   
    </label>   
    </p>   
    <?php wp_nonce_field('update-options'); ?>   
    <input type="hidden" name="action" value="update" />   
    <input type="hidden" name="page_options" value="ashu_copy_right,my_link" />   
    <p class="submit">   
        <input type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form>    -->
       
<?php } ?> 
