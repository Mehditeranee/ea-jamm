<?php while(have_posts()) : the_post(); ?>

	<div class="row align-items-center">
		<div class="col-sm">
			<div class="content-notrerobot">
				<h2 class="post-title"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-sm">
			<div class="col-tarif tarif1">
				<div class="tarif">
					<div class="prix">0 €</div>
					<div class="ttcMois">TTC / mois</div>
					<div class="engagement">Version démonstration</div>
				</div>
				<div class="trait"></div>
				<div class="listBullet">
					<div class="bullet bullet1">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Robot fiable et sécurisé</div>
					</div>
					<div class="bullet bullet2">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Langage MQL5</div>
					</div>
					<div class="bullet bullet3">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Identification de la tendance</div>
					</div>
					<div class="bullet bullet4">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">65 % de chance de gagner</div>
					</div>
				</div>
				<div class="button">
					<button class="souscrire">Souscrire</button>
				</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="col-tarif tarif2">
				<div class="tarif">
					<div class="prix">19,<div class="centimes">99</div> €</div>
					<div class="ttcMois">TTC / mois</div>
					<div class="engagement">Avec engagement d'1 an</div>
				</div>
				<div class="trait"></div>
				<div class="listBullet">
					<div class="bullet bullet1">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Robot fiable et sécurisé</div>
					</div>
					<div class="bullet bullet2">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Langage MQL5</div>
					</div>
					<div class="bullet bullet3">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Identification de la tendance</div>
					</div>
					<div class="bullet bullet4">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">65 % de chance de gagner</div>
					</div>
				</div>
				<div class="button">
					<button class="souscrire">Souscrire</button>
				</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="col-tarif tarif3">
				<div class="tarif">
					<div class="prix">29,<div class="centimes">99</div> €</div>
					<div class="ttcMois">TTC / mois</div>
					<div class="engagement">Sans engagement</div>
				</div>
				<div class="trait"></div>
				<div class="listBullet">
					<div class="bullet bullet1">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Robot fiable et sécurisé</div>
					</div>
					<div class="bullet bullet2">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Langage MQL5</div>
					</div>
					<div class="bullet bullet3">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">Identification de la tendance</div>
					</div>
					<div class="bullet bullet4">
						<div class="bulletPoint">
							<?php echo wp_get_attachment_image(45, array('30', '30'), "", array( "class" => "filter-blue" ) );  ?>
						</div>
						<div class="bulletContent">65 % de chance de gagner</div>
					</div>
				</div>
				<div class="button">
					<button class="souscrire">Souscrire</button>
				</div>
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