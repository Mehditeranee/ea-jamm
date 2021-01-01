<?php

/* Template Name: Custom Login Page */

global $user_ID;
global $wpdb;

if(!$user_ID)
{
	// if($_POST)
	// {

	// 	$username = $wpdb->escape($_POST['username']);
	// 	$password = $wpdb->escape($_POST['password']);

	// 	$login_array = array();
	// 	$login_array['user_login'] = $username;
	// 	$login_array['user_password'] = $password;

	// 	$verify_user = wp_signon($login_array, true);
	// 	if(!is_wp_error($verify_user))
	// 	{
	// 		echo "<script>window.location = '".site_url()."'</script>";
	// 	}
	// 	else
	// 	{
	// 		var_dump($verify_user);
	// 		echo "<p>Pseudo ou mot de passe incorrect(s).</p>";
	// 	}
	// }
	// else
	// {
	get_header();
	?>

	<div class="login_container">
		<div class="login_bloc">
			<div class="login_subbloc">
				<h2 class="login_title">Quel est votre nom d'utilisateur ou adresse mail ?</h2>
				<p class="login_suggest_registration">
					Veuillez vérifier votre adresse e-mail. Nous vous enverrons ensuite des instructions pour réinitialiser votre mot de passe.
				</p>
				<form name="lostPasswordForm" id="lostPasswordForm" class="lostPasswordForm" action="" method="post">
					
					<?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>  
					
					<input type="text" name="username" id="username" placeholder="Nom d'utilisateur ou e-mail" />
					<p class="status_pseudo"></p>

					<p class="status"></p>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ellipsis-1s-200px.gif" id="preloader" alt="Preloader" />

					<?php
						/**
						* Fires inside the lostpassword <form> tags, before the hidden fields.
						*
						* @since 2.1.0
						*/
						do_action( 'lostpassword_form' ); 
					?>
						<div class="submit_button_list">
							<button name="submit" id="submit" class="btn"><?php esc_attr_e('Réinitialiser mon mot de passe'); ?></button>
						</div>
						<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>

					</form>
				</div>
			</div>
		</div>

	
	<?php
	get_footer();
	// }
	//user in logged out state

}
else
{
	//user is logged in
	wp_redirect(home_url());
    exit;

}

	?>