<?php get_header(); 
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); 
?>
  <article>
    <section class="section__article-title">
      <div class="rhn-wrapper ptb-normal">
        <div class="section__article-title--content f-r-sb">
          <div class="article-title f-b-half">
            <span class="article-title--date">
              <?php the_field('rhn_article_date'); ?>
            </span>
            <h1 class="article-title--headline">
              <?php the_field('rhn_article_headline'); ?>
            </h1>
            <p class="article-title--subline">
              <?php the_field('rhn_article_subline'); ?>
            </p>
          </div>
          <div class="article-image f-b-half">
            <?php $article_image = get_field('rhn_article_image_group'); ?>
            <img src="<?php echo $article_image['rhn_article_image']; ?>" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="section__article-content">
      <div class="rhn-wrapper p-normal">  
        <?php if( have_rows('rhn_article_modules') ): ?>
          <?php while ( have_rows('rhn_article_modules') ) : the_row(); ?>
            <?php if( get_row_layout() == 'rhn_article_paragraph' ): ?>

              <section class="section__article-paragraph 
                              ptb-normal f-r-sb f-b-full">
                <div class="article-paragraph--paragraph f-b-tel6-5">
                  <?php the_sub_field('rhn_article_paragraph_content'); ?>
                </div>
                  <?php $marginal = get_sub_field('rhn_article_paragraph_marginal'); ?>
                  <?php if ($marginal) : ?>
                    <aside class="article-paragraph--marginal f-b-tel6">
                      <?php echo $marginal; ?>
                    </aside>
                  <?php endif; ?>
              </section>

            <?php endif; ?>

          <?php endwhile; ?>

        <?php else : ?>

        <?php endif; ?>
      </div>
    </section>
  </article>

<?php
  endwhile;
endif;
get_footer(); ?>