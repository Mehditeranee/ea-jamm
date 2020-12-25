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
					$custom_logo_id = get_theme_mod('custom_logo');
					$logo = wp_get_attachment_image_src($custom_logo_id,'full');
				}
			?>
			<img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="logo" >	



			<div class="collapse navbar-collapse" id="navbarNav">
				
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

			</div>
		</nav>
	</header>

	 <div class="main-wrapper">
