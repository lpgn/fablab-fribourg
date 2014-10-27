<?php

/////////
// MENUS

/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );

if ( ! function_exists( 'wpt_setup' ) ) {
  function wpt_setup() {
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'fablab' ),
      ) );
  }
}

require_once('wp_bootstrap_navwalker.php');

if (!current_user_can('edit_posts')) {
  add_filter('show_admin_bar', '__return_false');
}

/////////
// PAGE COMITE


/**
 * Register `team` post type
 */
function team_post_type() {

  // Labels
  $labels = array(
    'name' => _x("Comité", "post type general name"),
    'singular_name' => _x("Comité", "post type singular name"),
    'menu_name' => 'Comité',
    'add_new' => _x("Ajouter un profil", "team item"),
    'add_new_item' => __("Ajouter un nouveau profil"),
    'edit_item' => __("Editer le profil"),
    'new_item' => __("Nouveau profil"),
    'view_item' => __("Voir le profil"),
    'search_items' => __("Rechercher dans les profils"),
    'not_found' =>  __("Aucun profil trouvé"),
    'not_found_in_trash' => __("Acun profil trouvé dans la corbeille"),
    'parent_item_colon' => ''
  );

  // Register post type
  register_post_type('team' , array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-groups',
    'rewrite' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  ));
}
add_action( 'init', 'team_post_type', 0 );





/////////
// THEME CUSTOMIZATION



function fablabtheme_bootstrap_customize_register($wp_customize){

  $wp_customize->add_section('fablabtheme_bootstrap_jumbotron', array(
    'title'    => __('Header', 'fablabtheme_bootstrap'),
    'priority' => 120,
    ));


    //  =============================
    //  = Image Upload              =
    //  =============================
  $wp_customize->add_setting('fablabtheme_bootstrap_theme_options[image_upload_test]', array(
    'default'           => 'image.jpg',
    'capability'        => 'edit_theme_options',
    'type'              => 'theme_mod',
    ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
    'label'    => __('Image', 'fablabtheme_bootstrap'),
    'section'  => 'fablabtheme_bootstrap_jumbotron',
    'settings' => 'fablabtheme_bootstrap_theme_options[image_upload_test]',
    )));

}

add_action('customize_register', 'fablabtheme_bootstrap_customize_register');
