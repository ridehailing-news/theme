<?php
  // Menus
  if (!function_exists('rh_register_nav_menu')):
 
    function rh_register_nav_menu() {
        register_nav_menus( array(
            'header_menu' => __( 'Header Menu' ),
            'company_menu' => __( 'Header Company Menu' ),
            'footer_menu' => __( 'Footer Menu' )
        ) );
    }
    add_action( 'after_setup_theme', 'rh_register_nav_menu', 0 );

  endif;

  // Styles & Scripts
  if (!function_exists('rh_load_style')):
    function rh_load_style() {
      wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    }
    add_action( 'wp_enqueue_scripts', 'rh_load_style' );
  endif;

  // Custom Post Types
  function create_posttype() {

    register_post_type( 'companies',
    
        array(
            'labels' => array(
                'name' => __( 'Companies' ),
                'singular_name' => __( 'Company' )
            ),
            'public' => true,
            'taxonomies' => array( 'category', 'post_tag' ),
            'has_archive' => true,
            'menu_icon' => 'dashicons-building',
            'menu_position' => 3,
            'rewrite' => array('slug' => 'companies'),
        )
    );
  }

  add_action( 'init', 'create_posttype' );

?>