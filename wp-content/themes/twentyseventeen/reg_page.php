<style>
	p.ludou-error {
  margin: 16px 0;
  padding: 12px;
  background-color: #ffebe8;
  border: 1px solid #c00;
  font-size: 12px;
  line-height: 1.4em;
}
.ludou-reg label {
  color: #777;
  font-size: 14px;
  cursor: pointer;
}
.ludou-reg .input {
  margin: 0;
  color: #555;
  font-size: 24px;
  padding: 3px;
  border: 1px solid #e5e5e5;
  background: #fbfbfb;
}
</style>
<?php
/**
 * Template Name: 前台注册
 */
$preg= '/^1([3578]\d|47)\d{8}/';

if( !empty($_POST['ludou_reg']) ) {
  $error = '';
  $sanitized_user_login = sanitize_user( $_POST['user_login'] );

  // Check the username
  if ( $sanitized_user_login == '' ) {
    $error .= '<strong>错误</strong>：请输入用户名。<br />';
  } elseif ( ! preg_match($preg,$sanitized_user_login) ) {
    $error .= '<strong>错误</strong>：此用户名格式不正确，请输入有效的用户名<br />。';
    $sanitized_user_login = '';
  } elseif ( username_exists( $sanitized_user_login ) ) {
    $error .= '<strong>错误</strong>：该用户名已被注册，请再选择一个。<br />';
  }
   
  // Check the password
  if(strlen($_POST['user_pass']) < 6)
    $error .= '<strong>错误</strong>：密码长度至少6位!<br />';
  elseif($_POST['user_pass'] != $_POST['user_pass2'])
    $error .= '<strong>错误</strong>：两次输入的密码必须一致!<br />';
    if($error == '') {
    $user_id = wp_create_user( $sanitized_user_login, $_POST['user_pass'], $user_email );
    var_dump($user_id);
    if ( ! $user_id ) {
      $error .= sprintf( '<strong>错误</strong>：无法完成您的注册请求... 请联系<a href="mailto:%s">管理员</a>！<br />', get_option( 'admin_email' ) );
    }
    else if (!is_user_logged_in()) {
      $user = get_user_by( 'login', $sanitized_user_login );
      $user_id = $user->ID;
 
      // 自动登录
      wp_set_current_user($user_id, $user_login);
      wp_set_auth_cookie($user_id);
      do_action('wp_login', $user_login);
    }
  }
}

get_header(); ?>
<style>


</style>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    <h2 style="margin-top: 100px;">注册</h2>
			<?php the_content(); ?>
<?php if(!empty($error)) {
 echo '<p class="ludou-error">'.$error.'</p>';
}
if (!is_user_logged_in()) { ?>
<form name="registerform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="ludou-reg">
    <p>
      <label for="user_login">用户名<br />
        <input type="text" name="user_login" tabindex="1" id="user_login" class="input" placeholder="手机号" />
      </label>
    </p>
   
    <p>
      <label for="user_pwd1">密码(至少6位)<br />
        <input id="user_pwd1" class="input" tabindex="2" type="password" tabindex="21" size="25" value="" name="user_pass" />
      </label>
    </p>
   
    <p>
      <label for="user_pwd2">重复密码<br />
        <input id="user_pwd2" class="input" tabindex="3" type="password" tabindex="21" size="25" value="" name="user_pass2" />
      </label>
    </p>

    <p>
      <label for="vcode">验证码<br />
        <input id="vcode" class="input" tabindex="4" type="text" tabindex="21" size="25" value="" name="vcode" />
      </label>
    </p>

    <p>
      <label>点击获取验证码<br />
      </label>
    </p>

    <p class="submit">
      <input type="hidden" name="ludou_reg" value="ok" />
      <button class="button button-primary button-large" type="submit">注册</button>
    </p>
</form>
<?php } else {
 echo '<p class="ludou-error">您已注册成功，并已登录！</p>';
} ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
