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
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>">
        <div class="entry-content entry">
            <?php the_content(); ?>
            <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
            <?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <p class="form-username">
                        <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                        <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-username">
                        <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                        <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-email">
                        <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                        <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                    </p><!-- .form-email -->
                    <p class="form-url">
                        <label for="url"><?php _e('Website', 'profile'); ?></label>
                        <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                    </p><!-- .form-url -->
                    <p class="form-password">
                        <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                        <input class="text-input" name="pass1" type="password" id="pass1" />
                    </p><!-- .form-password -->
                    <p class="form-password">
                        <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input class="text-input" name="pass2" type="password" id="pass2" />
                    </p><!-- .form-password -->
                    <p class="form-textarea">
                        <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
                        <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                    </p><!-- .form-textarea -->

                    <?php 
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user); 
                    ?>
                    <p class="form-submit">
                        <?php echo $referer; ?>
                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
            <?php endif; ?>
        </div><!-- .entry-content -->
    </div><!-- .hentry .post -->
    <?php endwhile; ?>
<?php else: ?>
    <p class="no-data">
        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
    </p><!-- .no-data -->
<?php endif; ?>
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