<?php get_header(); ?>

<?php
  $tag_args = array(
    'orderby' => 'count',
    'order' => 'DESC'
  );
?>

<?php 
  $tags = get_tags($tag_args); 
  $curr_tag = wp_title('', false);  
?>

<section class="section__overview pb-big">
  <div class="rhn-wrapper ptb-normal f-r-sb">
    <div class="overview-content f-b-tel3 ptb-normal">
      <h1 class="overview-content--title text-bld-head mb-normal">
        <span class="overview-content--title-hashtag text-bold-head">#</span>
        <span><?php echo trim(strval($curr_tag)); ?></span>
      </h1>
    </div>
    <div class="overview-content f-b-tel2-3 ptb-normal">
      <div class="overview-content--title text-bld-normal plr-small">
        Other tags
      </div>
      <div class="overview-content--tag-container f-r-fe">
        <?php foreach($tags as $tag): ?>
          <?php $tag_link = get_tag_link( $tag->term_id ); ?>
          <a 
            href="<?php echo esc_url($tag_link); ?>"
            class="overview-content--tag-element" 
          >
            <?php echo '#' . $tag->name; ?>
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