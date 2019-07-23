<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,700&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/vuex"></script>

  <script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>

  <title><?php the_title(); ?></title>

  <?php wp_head(); ?>

  <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
  <header id="main-menu">
    <div class="rhn-menu_container">
      <div class="rhn-wrapper f-r-sb 
                  plr-normal ptb-small">
        <div id="rhn-menu__logo" 
             class="f-b-tel18-2">
          <a href="<?php home_url(); ?>" title="Link to Homepage">
            <?php include(get_template_directory() . '/assets/logo.php'); ?>
          </a>
        </div>
        <div class="rhn-menu__hamburger
                    f-b-tel18" 
             v-on:click="show = !show">
          <div class="rhn-menu__hamburger--container"
               :class="{ 'rhn-menu__hamburger--active' : show }"></div>
        </div>
      </div>
    </div>

    <transition name="fold-menu">
    <div id="rhn-submenu" 
        class="rhn-submenu__dropdown
               f-r-sb"
        v-if="show">

      <div class="rhn-wrapper 
                  f-r-sb plr-normal ptb-big">

        <nav class="rhn-nav__company--main 
                    f-b-tel6 pr-small">
          <?php wp_nav_menu( $args = array( 
            'menu' => 'header_menu',
            'theme_location' => 'header_menu',
            'menu_class' => 'header_menu',
          ) ) ?>
        </nav>

        <nav class="rhn-nav__company--sub 
                    f-b-tel6-5 pl-small">
          <?php wp_nav_menu( $args = array( 
            'menu' => 'company_menu',
            'theme_location' => 'company_menu',
            'menu_class' => 'company_menu f-r-fs',
          ) ) ?>
        </nav>
        
      </div>

    </div>
    </transition>

  </header>

  <main id="main-wrapper">