<?php get_header(); ?>

<?php
  $category_args = array(
    'category' => 'any',
    'orderby' => 'name',
    'order' => 'ASC'
  );
?>

<?php if (have_posts()): ?>

  <div class="pt-big">

<?php while (have_posts()): the_post(); ?>

    <section class="section__category-article">
      <div class="rhn-wrapper ptb-normal">
        <a href="<?php the_permalink(); ?>">
          <div class="section__category-article--content f-r-sb">
            <div class="category-article-title f-b-half">
              <span class="category-article-title--date">
                <?php the_field('rhn_article_date'); ?>
              </span>
              <h1 class="category-article-title--headline">
                <?php the_field('rhn_article_headline'); ?>
              </h1>
              <p class="category-article-title--subline">
                <?php the_field('rhn_article_subline'); ?>
              </p>
            </div>
            <div class="category-article-title-image f-b-half">
              <?php $article_image = get_field('rhn_article_image_group'); ?>
              <img src="<?php echo $article_image['rhn_article_image']; ?>" alt="">
            </div>
          </div>
        </a>
      </div>
    </section>

<?php endwhile; ?>
</div>

<?php else: ?>

  Sorry, we couldn't find contents here!

<?php endif; ?>

<?php get_footer(); ?>