<?php while(have_posts()) : the_post(); ?>

	<div class="row align-items-center">
		<div class="col-sm">
			<div class="image-presentation">
				<?php echo wp_get_attachment_image(32, array('392', '469'), "", array( "class" => "img-presentation" ) );  ?>
			</div>
		</div>
		<div class="col-sm">
			<div class="content-presentation">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="post-content"><?php the_content(); ?></div>
				<a class="button tarifs" href="#tarifs" role="button">Souscrire</a>
				<a class="button" href="#notre-robot" role="button">En savoir plus</a>
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