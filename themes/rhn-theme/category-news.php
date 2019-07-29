<?php get_header(); 

$args = array(
  'category_name' => 'news'
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
  while ( $query->have_posts() ) : $query->the_post(); 
?>
  <div class="rhn-wrapper plr-normal ptb-big">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>

<?php
  endwhile;
endif;
get_footer(); ?>