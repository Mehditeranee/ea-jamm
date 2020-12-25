
    <?php
    	get_header();
    ?>
   
	
		<article>
			<?php
			$menu_items = wp_get_nav_menu_items('main-nav');
			if( $menu_items ) {
			foreach ($menu_items as $menu_item ):
			$args = array('p' => $menu_item->object_id,'post_type' => 'any');

			global $wp_query;
			$wp_query = new WP_Query($args);
 			switch ($menu_item->title) {
				case "Présentation":
					$templatePart = 'presentation';
					break;
				case "Notre robot":
					$templatePart = 'notrerobot';
					break;
				case "Tarifs":
					$templatePart = 'tarifs';
					break;
				case "FAQ":
					$templatePart = 'faq';
					break;
				case "Nous contacter":
					$templatePart = 'nouscontacter';
					break;
				default:
				    $templatePart = $menu_item->object;
			} 

			//$templatePart = ($menu_item->title == 'Présentation') ? 'presentation' : $menu_item->object;
			$pageTitle = sanitize_title($menu_item->title);
			?>
			

			<section <?php post_class('sep ' .$pageTitle); ?> id="<?php echo str_replace(' ', '-', strtolower($pageTitle)) ?>">
				<?php 
				if ( have_posts() ){
				include(locate_template('home-'.$templatePart.'.php'));
			} ?>
		</section>
		<?php  endforeach; }; ?>

	    </article>
	    



    <?php
    	get_footer();
    ?>
    

