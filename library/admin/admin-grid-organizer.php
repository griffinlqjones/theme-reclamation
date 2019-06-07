<?php
// add_submenu_page('edit.php?post_type=person', 'Grid Organizer Title', 'Grid Organizer' );

/*  Admin stuff  */
add_action( 'admin_menu', 'add_gridbuilder_submenu' );
function add_gridbuilder_submenu() {
  add_submenu_page(
    'edit.php?post_type=person',
    'Grid Organizer Title',
    'Grid Organizer',
    'edit_published_posts',
    'grid-organizer-menu',
    'grid_organizer_page'
  );
}

add_action( 'admin_enqueue_scripts', 'enqueue_grid_organizer_resources' );
function enqueue_grid_organizer_resources($hook) {
  if ( 'person_page_grid-organizer-menu' != $hook ) {
    return;
  }

  wp_enqueue_script( 'grid-script', get_template_directory_uri() . '/dist/bundle.js', array(), null, true);
  wp_enqueue_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/library/css/style.css');
}

function grid_organizer_page() {
  //must check that the user has the required capability
  if (!current_user_can('edit_published_posts'))
  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  echo '<div class="admin-post-grid-editor">';
  get_template_part( 'library/template-parts/image-post-grid');
  echo '</div>';
}
?>
