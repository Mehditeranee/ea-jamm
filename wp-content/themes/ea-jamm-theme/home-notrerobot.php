<?php while(have_posts()) : the_post(); ?>

	<div class="row align-items-center">
		<div class="col-sm">
			<div class="content-notrerobot">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="post-content"><?php the_content(); ?></div>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-sm">
			<div class="image-notrerobot">
				<?php echo wp_get_attachment_image(41, array('274', '371'), "", array( "class" => "img-notrerobot" ) );  ?>
			</div>
		</div>
		<div class="col-sm">
			<div class="content-notrerobot2">
				<h3 class="title2-notrerobot">EA JAMM</h3>
				<div class="balise-notrerobot balise1">Robot fiable</div>
				<div class="balise-notrerobot balise2">Sécurisé</div>
				<p>
					Conçu pour négocier la paire EUR / USD, le principal mode de fonctionnement de EA JAMM est basé sur la tendance et le trading de positions courtes dans le sens du mouvement des prix.
				</p>
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