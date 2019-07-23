<?php get_header(); 
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); 
?>
  
  <section class="section__article-title">
    <div class="rhn-wrapper ptb-normal">
      <div class="section__article-title--content">
        <h1 class="article-title--headline f-b-tel3-2">
          <?php the_field('rhn_article_headline'); ?>
        </h1>
        <div class="article-title--image">
          <img src="<?php the_sub_field('rhn_article_image'); ?>" alt="">
        </div>
      </div>
    </div>
  </section>

<?php
  endwhile;
endif;
get_footer(); ?>