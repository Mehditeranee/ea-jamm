<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Blog Site Template</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://youtube.com/FollowAndrew">    
    <link rel="shortcut icon" href="images/logo.png"> 
    
	<?php
		wp_head();
	?>
    

</head> 

<body>
	
    <header class="navbar-fixed-top">
    	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php
				if(function_exists('the_custom_logo'))
				{
					if(is_front_page())
					{
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id,'full');
						?>
						<img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="logo" >	
					<?php	

					}
					else
					{
						$custom_logo_id = get_theme_mod('custom_logo');
						$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
								esc_url(home_url()),
					            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
					                'class'    => 'mb-3 mx-auto logo',
					                'alt'	   => 'logo'
					            ) )
					        );
					    
						/** $logo = wp_get_attachment_image_src($custom_logo_id,'full');**/
						//return $html;
						echo $html;   
					}
					
				}
			?>

		

<svg id="subscription" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="width:0; height:0;"><g transform="translate(0,-952.36218)"><path style="width:0; height:0;font-size:medium;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-indent:0;text-align:start;text-decoration:none;line-height:normal;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;text-anchor:start;baseline-shift:baseline;opacity:1;color:#f56c99;fill:#f56c99;fill-opacity:1;stroke:none;stroke-width:2;marker:none;visibility:visible;display:inline;overflow:visible;enable-background:accumulate;font-family:Sans;-inkscape-font-specification:Sans" d="M 12 7 C 10.666667 7 9.4383848 7.62412 8.53125 8.53125 C 7.6241152 9.43838 7 10.66667 7 12 L 7 70.96875 C 7 72.30375 7.6254774 73.5271 8.53125 74.4375 C 9.4370226 75.3479 10.660965 75.9994 12 76 L 24 76 L 24 87.96875 C 24 89.30375 24.625477 90.5271 25.53125 91.4375 C 26.437023 92.3479 27.660965 92.9994 29 93 L 88 93 C 89.329233 93 90.558647 92.37385 91.46875 91.46875 C 92.371766 90.57065 92.995509 89.3319 93 88 C 93.000035 87.989 93.000042 87.97875 93 87.96875 L 93 29 C 93 27.66667 92.375885 26.43838 91.46875 25.53125 C 90.561615 24.62392 89.333333 24 88 24 L 76 24 L 76 12 C 76 10.66667 75.375885 9.43838 74.46875 8.53125 C 73.561615 7.62412 72.333333 7 71 7 L 12 7 z M 12 9 L 71 9 C 71.666667 9 72.438385 9.34463 73.03125 9.9375 C 73.624115 10.53037 74 11.33333 74 12 L 74 24 L 29 24 C 27.666667 24 26.438385 24.62412 25.53125 25.53125 C 24.624115 26.43838 24 27.66667 24 29 L 24 74 L 12 74 C 11.320881 73.9997 10.527189 73.62395 9.9375 73.03125 C 9.3478111 72.43865 9 71.64765 9 70.96875 L 9 12 C 9 11.33333 9.3758848 10.53037 9.96875 9.9375 C 10.561615 9.34463 11.333333 9 12 9 z M 29 26 L 88 26 C 88.666667 26 89.438385 26.34463 90.03125 26.9375 C 90.624115 27.53037 91 28.33333 91 29 L 91 88 C 91.0028 88.6804 90.654452 89.44255 90.0625 90.03125 C 89.470548 90.62005 88.670767 91 88 91 L 29 91 C 28.320881 90.9997 27.527189 90.62395 26.9375 90.03125 C 26.347811 89.43865 26 88.64765 26 87.96875 L 26 29 C 26 28.33333 26.375885 27.53037 26.96875 26.9375 C 27.561615 26.34463 28.333333 26 29 26 z M 56 43 C 46.623009 43 39 50.623 39 60 C 39 66.3326 42.31923 71.91985 47.5 74.84375 A 1.0001 1.0001 0 1 0 48.5 73.125 C 43.95339 70.559 41 65.6336 41 60 C 41 51.7038 47.703837 45 56 45 C 64.05272 45 70.591181 51.323431 70.96875 59.28125 L 63.5 55.125 A 1.0077822 1.0077822 0 0 0 62.5 56.875 L 71.5 61.875 A 1.0001 1.0001 0 0 0 72.875 61.46875 L 77.875 52.46875 A 1.0001 1.0001 0 0 0 76.90625 50.96875 A 1.0001 1.0001 0 0 0 76.125 51.5 L 72.78125 57.46875 C 71.54566 49.300716 64.50849 43 56 43 z " transform="translate(0,952.36218)"/></g></svg>

	<svg id="tutorial" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 65 81.25" enable-background="new 0 0 65 65" xml:space="preserve" style="width:0; height:0;"><g><path d="M62.5,13.1H54v-7h-3.7V3.8H33.3h-1.5H14.6v2.4h-3.7v7H2.5c-1.5,0-2.8,1.2-2.8,2.8v35.4c0,1.5,1.2,2.8,2.8,2.8h21.7   l-3.8,5.7h-4v1.5h32.3v-1.5h-4l-3.8-5.7h21.7c1.5,0,2.8-1.2,2.8-2.8V15.9C65.3,14.4,64,13.1,62.5,13.1z M33.3,5.3h15.6v23.1H33.3   V5.3z M16.1,5.3h15.6v23.1H16.1V5.3z M12.4,7.7h2.2v22.2h17.1h1.5h17.1V7.7h2.2v25.1H12.4V7.7z M2.5,14.6h8.4v19.6H54V14.6h8.5   c0.7,0,1.3,0.6,1.3,1.3v32H1.3v-32C1.3,15.2,1.8,14.6,2.5,14.6z M42.8,59.7H22.2l3.8-5.7H39L42.8,59.7z M62.5,52.6h-60   c-0.7,0-1.2-0.6-1.2-1.3v-1.9h62.5v1.9C63.8,52,63.2,52.6,62.5,52.6z"/><path d="M19.8,21.5l9.2-4.7l-9.2-4.7V21.5z M21.3,14.6l4.4,2.3l-4.4,2.3V14.6z"/><rect x="35.9" y="8.2" width="10.3" height="1.5"/><rect x="35.9" y="13.4" width="10.3" height="1.5"/><rect x="35.9" y="18.6" width="10.3" height="1.5"/><rect x="38" y="23.7" width="6.2" height="1.5"/></g></svg>

	<svg id="profile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 60 75" style="enable-background:new 0 0 60 60;width:0; height:0;" xml:space="preserve"><path d="M12.3060303,47.6436768C16.8348999,52.1853027,23.0946655,55,30,55s13.1651001-2.8146973,17.6939697-7.3563232  c0.0015869-0.0012207,0.0025024-0.0029907,0.0040894-0.0042725C52.2077026,43.1148682,55,36.8776855,55,30  C55,16.2148438,43.7851563,5,30,5S5,16.2148438,5,30c0,6.8776855,2.7922974,13.1148682,7.3019409,17.6394043  C12.3035278,47.640686,12.3044434,47.6424561,12.3060303,47.6436768z M14.0524902,46.5498047  c2.0964966-7.0198975,8.5625-11.8798828,15.942627-11.8798828c7.3858643,0,13.8557739,4.8599243,15.9523926,11.8798828  C41.8091431,50.5389404,36.1881714,53,30,53S18.1908569,50.5389404,14.0524902,46.5498047z M21.9165039,24.5834961  C21.9165039,20.1264648,25.5429688,16.5,30,16.5s8.0830078,3.6264648,8.0830078,8.0834961S34.4570313,32.6665039,30,32.6665039  S21.9165039,29.0405273,21.9165039,24.5834961z M30,7c12.6821289,0,23,10.3178711,23,23  c0,5.675293-2.0705566,10.8733521-5.4902954,14.8889771c-2.0892944-5.6958008-6.8116455-9.9546509-12.5494385-11.5374756  c3.0539551-1.7348022,5.1227417-5.0119019,5.1227417-8.7680054C40.0830078,19.0234375,35.5595703,14.5,30,14.5  c-5.5600586,0-10.0834961,4.5234375-10.0834961,10.0834961c0,3.755249,2.067749,7.0316162,5.1207886,8.7667236  c-5.7362061,1.5819092-10.4576416,5.8414917-12.5470581,11.5386963C9.0704956,40.8733521,7,35.675293,7,30  C7,17.3178711,17.3178711,7,30,7z"/></svg>

	<svg id="log_out" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	viewBox="0 0 38.5 34" style="enable-background:new 0 0 38.5 34;width:0; height:0;" xml:space="preserve"><g><path d="M21.2,32.5H1.5v-31h19.7v8.9c0,0.5,0.3,0.8,0.8,0.8l0,0c0.5,0,0.8-0.3,0.8-0.8V0H0v34h22.7V23.6c0-0.5-0.3-0.8-0.8-0.8l0,0c-0.5,0-0.8,0.3-0.8,0.8V32.5z"/><path d="M28.5,8.1L28.5,8.1c-0.3,0.3-0.3,0.8,0,1.1l7.1,7.1H12.5c-0.5,0-0.8,0.3-0.8,0.8l0,0c0,0.5,0.3,0.8,0.8,0.8h23.2l-7.1,7.1c-0.3,0.3-0.3,0.8,0,1.1l0,0c0.3,0.3,0.8,0.3,1.1,0l8.9-8.9l-8.9-8.9C29.3,7.8,28.8,7.8,28.5,8.1z"/></g></svg>

			<div class="collapse navbar-collapse" id="navbarNav" role="navigation" align="center">
				
				<?php
					wp_nav_menu(
						array(
							'menu' => 'principal',
							'container' => '',
							'theme_location' => 'principal',
							'items_wrap' => '<ul id="" class="navbar-nav">%3$s</ul>',
							'walker' => new mono_walker()
						)
					);

				?>

			<?php

				global $user_ID;

				if(!$user_ID)
				{
			?>
			<div class="auth_header_container"> 
				<a class="button login" href="<?php echo wp_login_url(); ?>" role="button">Se connecter</a>
				<a class="link registration" href="<?php echo wp_registration_url(); ?>">Inscrivez-vous ici</a>
			</div>
			<?php
				}
				else
				{
					$user = get_userdata($user_ID);
					$first_name = $user->first_name;

			?>
			<div class="auth_header_container"> 
				<li class="dropdown">
					<a class="dropdown-toggle button account" href="<?php echo get_edit_profile_url($user_ID); ?>" role="button">
						<span id="nav-link-accountList-nav-line-1" class="nav-line-1 nav-progressive-content">Bonjour <?php echo $first_name ?></span>
						<span id="nav-link-accountList-nav-line-2">Compte<span class="nav-icon nav-arrow nav-white-arrow" style="visibility: visible;"><svg id="down-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><g><path id="down-arrow-path" d="M76.739,33H23.261l-0.586,0.586c-3.94,3.94-3.94,8.646,0,12.586l20.153,20.153c1.915,1.916,4.463,2.971,7.172,2.971   s5.257-1.055,7.172-2.971l20.153-20.153c3.94-3.94,3.94-8.646,0-12.586L76.739,33z"/></g></svg></span></span>
					</a>
					<ul class="dropdown-menu" id="menu1">
						<li><a href="<?php echo get_edit_profile_url($user_ID); ?>/#mon-abonnement"><svg class="menu-icon subscription" viewBox="0 0 24 24" data-icon="subscription" data-css-1nevli2="">
							<use xlink:href="#subscription"></use>
						</svg>Mon abonnement</a></li>
						<li><a href="<?php echo get_edit_profile_url($user_ID); ?>/#tutoriels"><svg class="menu-icon tutorial" viewBox="0 0 24 24" data-icon="tutorial" data-css-1nevli2="">
							<use xlink:href="#tutorial"></use>
						</svg>Tutoriels</a></li>
						<li><a href="<?php echo get_edit_profile_url($user_ID); ?>/#mes-informations"><svg class="menu-icon profile" viewBox="0 0 24 24" data-icon="profile" data-css-1nevli2="">
							<use xlink:href="#profile"></use>
						</svg>Mes informations</a></li>
						<li class="divider"></li>
						<li id="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>"><svg class="menu-icon log_out" viewBox="0 0 24 24" data-icon="log_out" data-css-1nevli2="">
							<use xlink:href="#log_out"></use>
						</svg>Déconnexion</a></li>
					</ul>
				</li>
			</div>

			<?php
				}

			?>
			</div>
		</nav>
	</header>

	 <div class="main-wrapper">
