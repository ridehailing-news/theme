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