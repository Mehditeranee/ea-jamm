<?php

function eajammtheme_theme_support(){
	// Adds dynamic title tag support
	add_theme_support('title_tag');
	add_theme_support('custom-logo');
	add_image_size('custom-logo', 636, 438, true);
}

add_action('after_setup_theme','eajammtheme_theme_support');


function eajammtheme_menus(){

	$locations = array(
		'principal' => "Menu principal navbar",
		'footer' => "Menu du footer"
	);

	register_nav_menus($locations);

}

add_action('init','eajammtheme_menus');

function eajammtheme_register_styles(){

	$version = wp_get_theme()->get( 'Version' );


	wp_enqueue_style('eajammtheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
	wp_enqueue_style('eajammtheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
	wp_enqueue_style('eajammtheme-style', get_template_directory_uri() . "/style.css", array('eajammtheme-bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'eajammtheme_register_styles');


function eajammtheme_register_scripts(){
	wp_enqueue_script('eajammtheme-jqueryvalidation', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js', array(), '1.19.2', true);
	wp_enqueue_script('eajammtheme-jquery', 'https://code.jquery.com/jquery-3.5.1.js', array(), '3.4.1', true);
	wp_enqueue_script('eajammtheme-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
	wp_enqueue_script('eajammtheme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
	wp_enqueue_script('eajammtheme-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);

}

add_action('wp_enqueue_scripts', 'eajammtheme_register_scripts');

class mono_walker extends Walker_Nav_Menu{
	function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';


		$parsedURL = parse_url( esc_attr( $item->url ));
		$cleanURL = substr_replace($parsedURL['path'],'',-1);//remove last '/';

		$pathTab = explode('/',$cleanURL);
		$pathTab[sizeof($pathTab)-1] = '#'.$pathTab[sizeof($pathTab)-1];
		$path = implode('/',$pathTab );

		$attributes .= ! empty( $item->url )        ? ' class="nav-link"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . $path .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' data-title="'   .   sanitize_title($item->title) .'"' : '';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

		if($depth != 0) $description = "";

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function redirect_to_homepage(){
	wp_safe_redirect( home_url() );
	exit;
}

add_action("wp_logout","redirect_to_homepage");

function fn_redirect_wp_admin(){
	global $pagenow;
	if($pagenow=="wp-login.php" && $_GET['action'] != "logout"){
		wp_redirect(site_url(). "/login");
		exit;
	}
}

add_action("init","fn_redirect_wp_admin");

add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );


function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery'), '1.0', true); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php',
        'redirecturl' => home_url(),
        'connexion' => home_url() . '/wp-login.php',
        'loadingmessage' => __('Envoi des identifiants, merci de patienter...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
    add_action('wp_ajax_myajax', 'ajax_login');
    add_action( 'wp_ajax_nopriv_ajaxforgotpassword', 'ajax_forgotPassword' );
    add_action('wp_ajax_ajaxforgotpassword', 'ajax_forgotPassword');
    // Enable the user with no privileges to run ajax_register() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $userdata = get_user_by('login', $info['user_login']);
    $result = wp_check_password($info['user_password'], $userdata->data->user_pass, $userdata->data->ID);

    if ( $result ) {

        auto_login( $userdata );
        echo json_encode(array('loggedin'=>true, 'message'=>__('Authentification réussie, redirection...')));

    } else {

        echo json_encode(array('loggedin'=>false, 'message'=>__('Nom d\'utilisateur ou Mot de passe incorrect.')));

    }

    die();

}

function auto_login( $user ) {

    if ( !is_user_logged_in() ) {

        $user_id = $user->data->ID;
        $user_login = $user->data->user_login;

        wp_set_current_user( $user_id, $user_login );
        wp_set_auth_cookie( $user_id );

    } 
}


add_filter( 'lostpassword_url',  'my_lostpassword_url', 10, 0 );
function my_lostpassword_url() {
    return site_url('/lost-password/');
}

add_filter( 'register_url',  'my_registration_url', 10, 0 );
function my_registration_url() {
    return site_url('/register/');
}
/*
 * @author	Tutspointer
 * @desc	Process all datas coming from theme-ajax.js
 * since 	v 1.0
 */
 
add_action( 'wp_ajax_nopriv_lost_pass', 'ajax_forgotPassword' );
add_action( 'wp_ajax_lost_pass', 'ajax_forgotPassword' );
/*
 *	@desc	Process lost password
 */
function ajax_forgotPassword(){
	 
	// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-forgot-nonce', 'security' );
	
	global $wpdb;
	
	$account = $_POST['user_login'];
	
	if( empty( $account ) ) {
		$error = 'Veuillez renseigner un nom d\'utilisateur ou un e-mail;';
	} else {
		if(is_email( $account )) {
			if( email_exists($account) ) 
				$get_by = 'email';
			else	
				$error = 'Aucun utilisateur enrgistré avec cette adresse mail.';			
		}
		else if (validate_username( $account )) {
			if( username_exists($account) ) 
				$get_by = 'login';
			else	
				$error = 'Aucun utilisateur enregistré avec ce nom d\'utilisateur.';				
		}
		else
			$error = 'Nom d\'utilisateur ou e-mail incorrect.';		
	}	
	
	if(empty ($error)) {
		// lets generate our new password
		//$random_password = wp_generate_password( 12, false );
		$random_password = wp_generate_password();

			
		// Get user data by field and data, fields are id, slug, email and login
		$user = get_user_by( $get_by, $account );
			
		$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
			
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
			
			$from = 'gallois.mehdi@gmail.com'; // Set whatever you want like mail@yourdomain.com
			
			if(!(isset($from) && is_email($from))) {		
				$sitename = strtolower( $_SERVER['SERVER_NAME'] );
				if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					$sitename = substr( $sitename, 4 );					
				}
				$from = 'admin@'.$sitename; 
			}
			
			$to = $user->user_email;
			$subject = 'Your new password';
			$sender = 'From: '.get_option('name').' <'.$from.'>' . "\r\n";
			
			$message = 'Your new password is: '.$random_password;
				
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = $sender;
				
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail ) 
				$success = 'Nous vous avons envoyé un nouveau mot de passe. Vérifiez votre boîte mail.';
			else
				$error = 'Impossible d\'envoyer un mail avec nouveau mot de passe. Réessayez plus tard ou contactez-nous.';						
		} else {
			$error = 'Oops! Une erreur s\'est produite lors de la mise à jour de votre compte. Réessayez plus tard ou contactez-nous.';
		}
	}
	
	if( ! empty( $error ) )
		echo json_encode(array('loggedin'=>false, 'type'=>'error', 'message'=>__($error)));
			
	if( ! empty( $success ) )
		echo json_encode(array('loggedin'=>false, 'type'=>'success', 'message'=>__($success)));
				
	die();
}

function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );
		
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['first_name'] = sanitize_text_field($_POST['firstname']);
    $info['last_name'] = sanitize_text_field($_POST['lastname']);
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
    $info['user_pass'] = sanitize_text_field($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
	
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;
		
		if(in_array('empty_user_login', $error))
			echo json_encode(array('loggedin'=>false, 'type'=>'error', 'message'=>__($user_register->get_error_message('empty_user_login'))));
		elseif(in_array('existing_user_login',$error))
			echo json_encode(array('loggedin'=>false, 'type'=>'error', 'message'=>__('Ce Nom d\'utilisateur est déjà enregistré.')));
		elseif(in_array('existing_user_email',$error))
        echo json_encode(array('loggedin'=>false, 'type'=>'error', 'message'=>__('Cette adresse mail est déjà enregistrée.')));
    } else {
	  $userdata = get_user_by('login', $info['user_login']); 
	  auto_login( $userdata ); 
	  echo json_encode(array('loggedin'=>true, 'type'=>'success', 'message'=>__('Le compte a bien été crée. Vous allez être redirigé...')));    
    }

    die();
}


?>