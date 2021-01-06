<?php while(have_posts()) : the_post(); ?>

	<div class="account tutoriels row align-items-center">
		<div class="col-sm">
			<div class="content-tutoriels">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="post-content"><?php the_content(); ?></div>
			</div>
		</div>
	</div>
	<svg id="arrow_right" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 53 94.9" style="enable-background:new 0 0 53 94.9;width:0; height:0;" xml:space="preserve">
		<g id="Calque_2">
		</g>
		<g id="Calque_1">
			<path d="M9.5,1.6l41.9,41.9c1,1.1,1.6,2.5,1.6,4s-0.5,2.9-1.6,4L9.5,93.3c-2.2,2.2-5.7,2.2-7.9,0c-2.2-2.2-2.2-5.7,0-7.9l37.9-37.9
				L1.6,9.5c-2.2-2.2-2.2-5.7,0-7.9C2.7,0.5,4.2,0,5.6,0S8.5,0.5,9.5,1.6z"/>
		</g>
	</svg>
	<svg id="arrow_left" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 53 94.9" style="enable-background:new 0 0 53 94.9;width:0; height:0;" xml:space="preserve">
		<g id="Calque_2">
		</g>
		<g id="Calque_1">
			<path d="M47.4,0c1.4,0,2.9,0.5,4,1.6c2.2,2.2,2.2,5.7,0,7.9l-37.9,38l37.9,37.9c2.2,2.2,2.2,5.7,0,7.9c-2.2,2.2-5.7,2.2-7.9,0
				L1.6,51.5C0.5,50.4,0,49,0,47.5c0-1.5,0.6-2.9,1.6-4L43.5,1.6C44.6,0.5,46,0,47.4,0z"/>
		</g>
	</svg>


						<!-- <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
							<div class="carousel-inner w-100" role="listbox">-->

								
								<?php
								$args = array(
									'post_type' => 'attachment',
									'post_mime_type' => 'video',
									'numberposts' => -1,
									'post_status' => null,
									    'post_parent' => null, // any parent
									); 
								$attachments = get_posts($args);
								if ($attachments) {
									$isFirst = true;
									foreach ($attachments as $post) {

										?>
											<!--<div class="carousel-item <?php echo $isFirst ? ' active' : '' ?>">
													<div class="col-md-4">
														<div class="card card-body">
															<div class="video-image">
																<img class="img-fluid" src="<?php the_post_thumbnail_url() ; ?>">
															</div>
															<h4 class="video-title"><?php the_title(); ?></h4>
															<p class="video-description"><?php the_excerpt(); ?></p>
															
														</div>
													</div>
												</div>-->

											<!--the_post_thumbnail('medium');
											 // the_post_thumbnail_url() ;
											// setup_postdata($post);
											// the_title();
											// the_attachment_link($post->ID, false);
											// the_excerpt();
											// $isFirst = false; -->
											<?php
											$isFirst = false;
										}
									}
									?>


							<!--</div>
							<a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div> -->
						<div class="container-fluid">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner row mx-auto" style="width:80% !important;">

								<?php
								$args = array(
									'post_type' => 'attachment',
									'post_mime_type' => 'video',
									'numberposts' => -1,
									'post_status' => null,
									    'post_parent' => null, // any parent
									); 
								$attachments = get_posts($args);
								if ($attachments) {
									$isFirst = true;
									foreach ($attachments as $post) {

								?>

									<div id="carousel-item" class="carousel-item col-md-4 <?php echo $isFirst ? ' active' : '' ?>">
										<div class="card">
											<div class="card-image">
												<img data-toggle="modal" data-target="#exampleModalCenter" class="openMdl card-img-top img-fluid" style="position:relative; top:0; left:0;" width="100%" src="<?php the_post_thumbnail_url() ; ?>" alt="Card image cap">
												<img width="50px" style="position:absolute; top:50%; left: 50%; transform: translate(-50%, -50%);" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play-btn.svg" class="openMdl play-btn" data-toggle="modal" data-target="#exampleModalCenter"></img>
												<a id="video_url" href="<?php echo wp_get_attachment_url($post->ID); ?>"></a>
											</div>
											<div class="card-body">
												<h4 class="openMdl card-title" data-toggle="modal" data-target="#exampleModalCenter"><?php the_title(); ?></h4>
												<p class="card-text"><?php the_excerpt(); ?></p>
											</div>
										</div>
									</div>
								<?php
										$isFirst = false;
									}
								}
								?>
									
								</div>
								<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
									<div class="arrow-container">	
										<svg class="arrow left" viewBox="0 0 24 24" data-icon="arrow_left" data-css-1nevli2="">
											<use xlink:href="#arrow_right"></use>
										</svg>
										<span class="sr-only">Previous</span>
									</div>
								</a>
								<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
									<div class="">	
										<svg class="arrow right" viewBox="0 0 24 24" data-icon="arrow_right" data-css-1nevli2="">
											<use xlink:href="#arrow_right"></use>
										</svg>
										<span class="sr-only">Next</span>
									</div>
								</a>
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<video id="video" width="100%" autoplay controls>
										</video>
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