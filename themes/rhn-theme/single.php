<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

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
          <div class="article-title-image f-b-half">
            <?php $article_image = get_field('rhn_article_image_group'); ?>
            <img src="<?php echo $article_image['rhn_article_image']; ?>" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="section__article-content">
      <div class="rhn-wrapper plr-normal">  
        <?php if( have_rows('rhn_article_modules') ): ?>
          <?php while ( have_rows('rhn_article_modules') ) : the_row(); ?>
            <?php if( get_row_layout() === 'rhn_article_paragraph' ): ?>

              <section class="section__article-paragraph
                              ptb-normal f-r-sb f-b-full">
                <div class="article-paragraph--paragraph 
                            text-reg-normal f-b-tel2-3">
                  <?php the_sub_field('rhn_article_paragraph_content'); ?>
                </div>

                <?php $marginal = get_sub_field('rhn_article_paragraph_marginal'); ?>
                <?php if ($marginal) : ?>
                  <aside class="article-paragraph--marginal
                                text-ita-normal 
                                f-b-tel3">
                    <?php echo $marginal; ?>
                  </aside>
                <?php endif; ?>
              </section>
            
            <?php elseif( get_row_layout() === 'rhn_quote' ): ?>
              
              <section class="section__article-quote mtb-big f-r-sb f-b-full">
                <div class="article-quote--quote f-b-tel2-3">
                  <blockquote class="rhn-text__paragraph--quote
                                     text-reg-head 
                                     f-b-tel2-3 pr-big">
                    <?php the_sub_field('rhn_quote_content'); ?>
                  </blockquote>
                </div>
                <aside class="article-quote--marginal
                              pl-normal text-ita-normal
                              f-b-tel3">
                  <?php $quote_source = get_sub_field('rhn_quote_source'); ?>
                  <a href="<?php echo $quote_source; ?>"><?php the_sub_field('rhn_quote_author'); ?></a>
                </aside>
              </section>

            <?php elseif( get_row_layout() === 'rhn_list' ): ?>

              <section class="section__article-list 
                              ptb-normal f-r-sb">
                <div class="article-list--list f-b-tel2-3">
                  <?php the_sub_field('rhn_list_list'); ?>
                </div>
              </section>
            
            <?php elseif( get_row_layout() === 'rhn_image' ): ?>

              <?php $image_source = get_sub_field('rhn_image_source'); ?>

              <section class="section__article-image ptb-normal ">
                <div class="article-image--wrapper f-r-sb">
                  <div class="article-image--container f-b-tel2-3">
                    <img src="<?php the_sub_field('rhn_image_image'); ?>" alt="<?php the_sub_field('rhn_image_description'); ?>">
                  </div>
                  <div class="article-image--marginal  plr-normal f-b-tel3">
                    <div class="article-image--marginal-content f-c-sb text-ita-normal">
                      <span><?php the_sub_field('rhn_image_description'); ?></span>
                      <span>
                        <a href="<?php $image_source['url'] ?>" target="<?php echo $image_source['target']; ?>">
                          <?php echo $image_source['title'] ? $image_source['title'] : $image_source['url']; ?>
                        </a>
                      </span>
                    </div>
                  </div>
                </div>
              </section>

            <?php elseif( get_row_layout() === 'rhn_essence' ): ?>

              <section class="section__article-essence ptb-normal f-r-sb">
                <div class="article-essece--wrapper f-c-sb f-b-tel2-3">
                  <p class="article-essece--title text-ita-normal ">
                    <?php the_sub_field('rhn_essence_title') ?>
                  </p>
                  <blockquote class="article-essece--content text-lig-head">
                    <?php the_sub_field('rhn_essence_content') ?>
                  </blockquote>
                </div>
              </section>

            <?php elseif( get_row_layout() === 'rhn_embed' ): ?>

              <section class="section__article-embed ptb-normal mtb-normal f-r-sb">
                <div class="article-embed--wrapper">
                  <?php the_sub_field('rhn_embed_embed') ?>
                </div>
              </section>

            <?php endif; ?>

          <?php endwhile; ?>

          <?php if( have_rows('rhn_general_links') ): ?>
            <section class="section__general-links mt-big">
              <p class="article-general-links--title">Weiterführende Links:</p>
              <ul class="plr-normal">
                <?php while ( have_rows('rhn_general_links') ) : the_row(); ?>

                  <?php $general_link = get_sub_field('rhn_general_links_link'); ?>
                  
                  <?php 
                    $link_name = ($general_link['title']) 
                      ? $general_link['title']
                      : $general_link['url'];
                    ?>

                  <li class="mtb-normal">
                    <a class="text-ita-normal" href="<?php echo $general_link['url']; ?>"><?php echo $link_name; ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </section>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </section>
  </article>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>