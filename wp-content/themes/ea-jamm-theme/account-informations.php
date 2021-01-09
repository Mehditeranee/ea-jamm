<?php while(have_posts()) : the_post(); ?>

	<div class="account informations row align-items-center">
		<div class="col-sm">
			<div class="content-informations">
				<h2 class="post-title"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	<div class="account informations row align-items-center">
		<div class="col-sm">
			
			<?php 

			$prenom = get_user_meta ( $user_ID, 'first_name', TRUE );
			$nom = get_user_meta ( $user_ID, 'last_name', TRUE );

			$user_info = get_userdata($user_ID);
			//var_dump($user_info);
			$username = $user_info->user_login;
			$email = $user_info->user_email;
			$password = $user_info->user_pass;
			?>
			<div class="info_container">
				<div class="info" id="prenom"><?php echo $prenom?></div>
				<div class="info" id="nom"><?php echo $nom?></div>
				<div class="info" id="username"><?php echo $username?></div>
				<div class="info" id="email"><?php echo $email?></div>
				<div class="info" id="password"><?php echo $password?></div>
			</div>
			
			

		</div>
	</div>


	<?php
	$args = array( 'posts_per_page'=>-1, 'post_typ'=>'realisation','orderby'=> 'menu_order', 'order'=> 'ASC'); 
	$loop = new WP_Query( $args ); 
	if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
		$link = get_permalink($post->ID);
		$thumbID = get_post_thumbnail_id($post->ID);
		$postImg = wp_get_attachment_image_src($thumbID,'width=1140&crop=1' );
		$baseline = $post->post_excerpt;
		?>
	</a>
</div>
<?php endwhile;endif; ?>
<?php endwhile;