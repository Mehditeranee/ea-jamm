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
      <ul class="faq">
        <li>
          <h3 class="question">Qu'est-ce que le trading ?
            <div class="plus-minus-toggle collapsed"></div>
          </h3>
          <div class="answer">Le trading est un mot anglais couramment utilisé en France pour désigner les opérations d'achats et de ventes effectuées sur les marchés financiers. Ces opérations sont réalisées par des traders depuis la salle des marchés d'une institution financière ou boursière, ou depuis Internet dans le cas des traders indépendants. 
          Le trading définit également la discipline du négoce désormais enseignée à travers des formations dispensées au sein d'écoles de commerce ou par des professionnels indépendants.</div>
        </li>
        <li>
          <h3 class="question">Après mon paiement, je n'ai rien reçu ? 
            <div class="plus-minus-toggle collapsed"></div>
          </h3>
          <div class="answer">
            Dans un premier temps, assurez-vous de bien avoir effectué le paiement. Si c'est le cas, vous devriez avoir reçu un mail de confirmation de souscription. 
            Pour que votre robot fonctionne, vous devez également uploader votre QR code MetaTrader depuis votre espace personnel.
          </div>
        </li>
      </ul>
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



 

