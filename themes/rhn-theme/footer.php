    <?php if (is_single()): ?>

      <?php 
        $author = get_field('rhn_article_author'); 
        $author_favourite = get_field('rhn_author_favourite', 'user_'.$author->ID);
      ?>

      <?php if ($author): ?>
        <article>
          <section class="section__article-content">
            <div class="rhn-wrapper">
              <section class="section__author">
                <div class="article-author--wrapper f-r-sb">
                  <div class="article-author--container f-b-tel2-3 f-r-sb">
                    <div class="article-author--image f-b-tel3">
                      <img src="<?php the_field('rhn_author_image', 'user_'.$author->ID); ?>" alt="<?php echo $author->display_name; ?>">
                    </div>
                    <div class="article-author--content f-b-tel2-3 p-normal">
                      <div class="f-r-sb pb-normal">
                        <p class="article-author--name">
                          <?php echo $author->display_name; ?>
                        </p>
                        <p class="article-author--role">
                          Autor
                        </p>
                      </div>
                      <p class="article-author--description pt-small">
                      <?php echo $author->user_description; ?>
                      </p>
                    </div>
                  </div>
                  <div class="article-author--favourite-container f-b-tel3 plr-normal">
                    <div class="article-author--favourite p-normal">
                      <a href="<?php the_permalink($author_favourite); ?>">
                        <div class="article-author--favourite-link"></div>
                        <span class="p-normal"><?php echo get_field('rhn_article_headline', $author_favourite);?><span>
                      </a>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </section>
        </article>
        
      <?php endif; ?>
    
    <?php elseif (is_category()): ?>
      
      <?php $tags = get_tags(); ?>

      <div class="rhn-wrapper">
        <section class="section__tags ptb-big">
          <div class="overview-content--tag-container f-r-fs">
            <?php foreach($tags as $tag): ?>
              <?php $tag_link = get_tag_link( $tag->term_id ); ?>
              <a 
                href="<?php echo esc_url($tag_link); ?>"
                class="tags--tag-element" 
              >
                <?php echo '#' . $tag->name; ?>
              </a>
            <?php endforeach; ?>
          </div>
        </section>
      </div>

    <?php else: ?>

      <?php 
        $footer_query_args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'orderby'   => 'rand'
        );
      ?>

      <?php $footer_query = new WP_QUERY($footer_query_args); ?>

      <?php if ($footer_query->have_posts()): ?>

        <div class="rhn-wrapper">
          <section class="section__suggestion">
            <div class="suggestion--wrapper f-r-sb">

              <?php while ($footer_query->have_posts()): $footer_query->the_post(); ?>

                <div class="suggestion-article f-b-tel3 plr-normal">
                  <div class="suggestion-article--container p-normal">
                    <a href="<?php the_permalink(); ?>">
                      <div class="suggestion-article--link"></div>
                      <div class="suggestion-article--title p-normal">
                        <div><?php the_field('rhn_article_headline'); ?></div>
                      </div>
                    </a>
                  </div>
                </div>

              <?php endwhile; ?>

            </div>
          </section>
        </div>
      <?php endif; ?>

    <?php endif; ?>

    </main>

    <footer id="main-footer">
      <div class="rhn-wrapper 
                  plr-normal ptb-big">
        <?php wp_nav_menu( $args = array( 
          'menu' => 'footer_menu',
          'theme_location' => 'footer_menu',
          'menu_class' => 'footer_menu f-r-fs',
        ) ) ?>
      </div>
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>

<script src="<?php bloginfo('template_directory') ?>/vue/menu.js"></script>