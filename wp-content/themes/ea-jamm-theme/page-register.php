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
	<svg version="1.1"
	 id="eye_closed" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 86 76"
	 style="enable-background:new 0 0 86 76;width:0; height:0;" xml:space="preserve">
	<g transform="translate(0,-952.36218)">
		<path d="M80,952.4c-0.3,0-0.5,0.1-0.7,0.3l-74,74c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0l18-18
			c5.7,2.2,11.8,3.3,18.2,3.3c17.6,0,33.1-8.8,42.8-22.4c0.2-0.3,0.2-0.8,0-1.2c-5.7-8-13.5-14.4-22.6-18.2l17.5-17.5
			c0.4-0.4,0.4-1,0-1.4C80.5,952.5,80.3,952.3,80,952.4z M43,967.4c-17.6,0-33.1,8.8-42.8,22.4c-0.2,0.3-0.2,0.8,0,1.2
			c5.3,7.5,12.5,13.5,20.7,17.4l1.5-1.5c-8-3.7-14.9-9.3-20.1-16.5c9.4-12.8,24.1-21,40.7-21c5.1,0,10,0.8,14.7,2.2l1.6-1.6
			C54.1,968.3,48.7,967.4,43,967.4z M61.7,973.1c8.8,3.6,16.4,9.6,22,17.3c-9.4,12.8-24.1,21-40.7,21c-5.8,0-11.5-1-16.7-2.9l8.3-8.3
			c2.3,2,5.2,3.2,8.4,3.2c7.2,0,13-5.8,13-13c0-3.2-1.2-6.1-3.2-8.4L61.7,973.1z M43,977.4c-7.2,0-13,5.8-13,13c0,2.5,0.7,4.9,2,6.9
			l1.4-1.4c-0.9-1.6-1.4-3.5-1.4-5.4c0-6.1,4.9-11,11-11c2,0,3.8,0.5,5.4,1.4l1.4-1.4C47.9,978.1,45.5,977.4,43,977.4z M51.4,983.4
			c1.6,1.9,2.6,4.4,2.6,7c0,6.1-4.9,11-11,11c-2.7,0-5.1-1-7-2.6L51.4,983.4z"/>
	</g>
	</svg>

	<svg version="1.1"
	 id="eye_open" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 86 46"
	 style="enable-background:new 0 0 86 46;width:0; height:0;" xml:space="preserve">
	<g transform="translate(0,-952.36218)">
		<path d="M43,952.4c-17.6,0-33.1,8.8-42.8,22.4c-0.2,0.3-0.2,0.8,0,1.2c9.7,13.6,25.3,22.4,42.8,22.4s33.1-8.8,42.8-22.4
			c0.2-0.3,0.2-0.8,0-1.2C76.1,961.2,60.6,952.4,43,952.4z M43,954.4c16.6,0,31.4,8.2,40.7,21c-9.4,12.8-24.1,21-40.7,21
			s-31.4-8.2-40.7-21C11.6,962.6,26.4,954.4,43,954.4z M43,962.4c-7.2,0-13,5.8-13,13c0,7.2,5.8,13,13,13s13-5.8,13-13
			C56,968.2,50.2,962.4,43,962.4z M43,964.4c6.1,0,11,4.9,11,11s-4.9,11-11,11s-11-4.9-11-11S36.9,964.4,43,964.4z"/>
	</g>
	</svg>
	<div class="register_container">
		<div class="register_bloc">
			<div class="register_subbloc">
				<h2 class="register_title">S'inscrire</h2>
				<p class="register_suggest_registration">
					<span class="text">Vous avez déjà un compte ?<!-- -->&nbsp;</span>
					<a class="link" href="<?php echo wp_login_url(); ?>">Se Connecter</a>
				</p>
				<form name="register_form" id="register_form" class="register_form" action="" method="post">
					
					<input type="text" name="firstname" id="firstname" placeholder="Votre prénom" />
					<p class="status_prénom"></p>
					<input type="text" name="lastname" id="lastname" placeholder="Votre nom" />
					<p class="status_nom"></p>
					<input type="text" name="username" id="username" placeholder="Nom d'utilisateur" />
					<p class="status_pseudo"></p>
					<input type="text" name="email" id="email" placeholder="Adresse e-mail" />
					<p class="status_mail"></p>
					<div class="password_input">
						<input type="password" name="password" id="password" placeholder="Mot de passe (8 caractères)" />
						<svg class="oeil" viewBox="0 0 24 24" data-icon="eye_closed" data-css-1nevli2="">
							<use xlink:href="#eye_closed"></use>
						</svg>
					</div>
					<p class="status_password"></p>
					<p class="status"></p>
					<div class="submit_button_list">
						<button name="submit" id="submit" class="btn"><?php _e("S'inscrire", "shorti"); ?></button>
					</div>
					<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?> 

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