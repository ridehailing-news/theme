<?php get_header(); ?>

  <article>
    <section class="section__page">
      <div class="rhn-wrapper ptb-normal">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?> 
        <?php else: ?>
          <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
      </div>
    </section>
  </article>

<?php get_footer(); ?>