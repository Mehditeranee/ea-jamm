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
				<h2 class="login_title">Se connecter</h2>
				<p class="login_suggest_registration">
					<span class="text">Vous débutez sur EA JAMM ?<!-- -->&nbsp;</span>
					<a class="link" href="<?php echo wp_registration_url(); ?>">Inscrivez-vous gratuitement</a>
				</p>
				<form name="login_form" id="login_form" class="login_form" action="" method="post">
					
					<input type="text" name="username" id="username" placeholder="Nom d'utilisateur" />
					<p class="status_pseudo"></p>
					<input type="password" name="password" id="password" placeholder="Mot de passe (8 caractères)" />
					<p class="status_password"></p>
					<a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Vous avez oublié votre mot de passe ?</a>
					<p class="status"></p>
					<div class="submit_button_list">
						<button name="submit" id="submit_auth" class="btn"><?php _e("Se connecter", "shorti"); ?></button>
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