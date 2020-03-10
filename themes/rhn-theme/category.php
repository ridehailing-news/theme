<?php get_header(); ?>

<?php
  $category_args = array(
    'orderby' => 'name',
    'order' => 'ASC'
  );
?>

<?php 
  $categories = get_categories($cat_args);
?>

<section class="section__overview pb-big">
  <div class="rhn-wrapper ptb-normal f-r-sb">
    <div class="overview-content f-b-half ptb-normal">
      <h1 class="overview-content--title text-bld-head mb-normal">
        <?php wp_title('', true); ?>
      </h1>
      <div class="overview-content--description text-reg-normal">
        <?php echo category_description(); ?>
      </div>
    </div>
    <div class="overview-content f-b-half ptb-normal">
      <div class="overview-content--title text-bld-normal plr-small">
        Other categories
      </div>
      <div class="overview-content--category-container f-r-fe">
        <?php foreach($categories as $category): ?>
          <?php $category_link = get_category_link($category->term_id); ?>
          <a 
            href="<?php echo esc_url($category_link); ?>"
            class="overview-content--category-element" 
          >
            <?php echo $category->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

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

<script>
  function registerEventListeners () {
    window.addEventListener('scroll', transformStickyOverview)
  }
  
  function transformStickyOverview () {
    let scrollPosition = overview.offsetTop;
  
    if (scrollPosition > 95) {
      overview.classList.add('stuck');
    } else {
      overview.classList.remove('stuck');
    }
  }
  
  let overview = document.querySelector('.section__overview');
  transformStickyOverview();
  registerEventListeners();
</script>

<?php get_footer(); ?>