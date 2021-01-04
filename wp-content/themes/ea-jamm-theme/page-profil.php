<?php

/* Template Name: Custom Login Page */

global $user_ID;
global $wpdb;

if($user_ID)
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
	get_header('account');
	?>
	
	<article>
			<?php
			$menu_items = wp_get_nav_menu_items('Menu du compte');
			if( $menu_items ) {
			foreach ($menu_items as $menu_item ):
			$args = array('p' => $menu_item->object_id,'post_type' => 'any');

			global $wp_query;
			$wp_query = new WP_Query($args);
 			switch ($menu_item->title) {
				case "Mon abonnement":
					$templatePart = 'abonnement';
					break;
				case "Tutoriels":
					$templatePart = 'tutoriels';
					break;
				case "Mes informations":
					$templatePart = 'informations';
					break;
				default:
				    $templatePart = $menu_item->object;
			} 

			//$templatePart = ($menu_item->title == 'Présentation') ? 'presentation' : $menu_item->object;
			$pageTitle = sanitize_title($menu_item->title);
			?>
			

			<section <?php post_class('sep ' .$pageTitle); ?> id="<?php echo str_replace(' ', '-', strtolower($pageTitle)) ?>">
				<?php 
				if ( have_posts() ){
				include(locate_template('account-'.$templatePart.'.php'));
			} ?>
		</section>
		<?php  endforeach; }; ?>

	    </article>
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