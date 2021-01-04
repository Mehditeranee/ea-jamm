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
			
		</div>
		<div class="col-sm">
			
		</div>
		<div class="col-sm">
			
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