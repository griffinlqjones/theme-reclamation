<?php
/* Register WordPress  Gutenberg CPT */

// Warning: require_once():
// http:// wrapper is disabled in the server configuration by allow_url_include=0 in
// /app/public/wp-content/themes/theme-reclamation/library/custom-post-types/person.php on line 4 Warning:
// require_once(http://reclamation.loc/wp-content/themes/theme-reclamation/library/template-parts/admin-grid-builder.php):
// failed to open stream:
// no suitable wrapper could be found in
// /app/public/wp-content/themes/theme-reclamation/library/custom-post-types/person.php
//  on line 4 Fatal error: require_once():
//  Failed opening required
//  'http://reclamation.loc/wp-content/themes/theme-reclamation/library/template-parts/admin-grid-builder.php'
//  (include_path='.:/usr/share/php:/www/wp-content/pear') in
//  /app/public/wp-content/themes/theme-reclamation/library/custom-post-types/person.php on line 4
// The site is experiencing technical difficulties. Please check your site admin email inbox fo

add_action( 'init', 'person_post_type' );
// Custom Post Type
function person_post_type() {

  $labels = array(
    'name' => __( 'Person', 'theme-reclamation' ),
    'singular_name' => __( 'Person', 'theme-reclamation' ),
    'plural_name' => __( 'People', 'theme-reclamation' ),
    'edit_item' => __( 'Edit Person', 'theme-reclamation' ),
    'view_item' => __( 'View Person', 'theme-reclamation' ),
    'featured_image' =>__( 'Person\'s Portrait', 'theme-reclamation' ),
    'set_featured_image' =>__( 'Set Person\'s Portrait', 'theme-reclamation' ),
    'remove_featured_image' =>__( 'Remove Person\'s Portrait', 'theme-reclamation' ),
    'use_featured_image' =>__( 'Use Person\'s Portrait', 'theme-reclamation' ),
  );

  $args = array(
    'labels' => $labels,
    'description' => __( 'Description.', 'theme-reclamation'),
    // 'capability_type' => array( 'person', 'people' ),
    'has_archive' => true,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_in_menu' => true,
    'rewrite' => array('slug' => 'person'),
    'can_export' => true,
    'supports' => array('title', 'editor', 'author', 'page-attributes', 'revisions', 'category', 'custom-fields' ),
    'menu_icon' => 'dashicons-id-alt',
    'menu_position' => 2
  );

  register_post_type('person', $args );
}

/* Register category selection */
function reg_cat() {
  register_taxonomy_for_object_type('category','person');
}
add_action('init', 'reg_cat');

/* Register tag selection */
function reg_tag() {
  register_taxonomy_for_object_type('post_tag', 'CUSTOM_POST_TYPE');
}
add_action('init', 'reg_tag');

/* Block whitelist */
function block_whitelist_allowed_block_types( $allowed_block_types, $post ) {
  if ( $post->post_type !== 'person' ) {
    return $allowed_block_types;
  }
  return array(
    'core/image',
    'core/audio',
    'core/video',
    'core/media-text',
    'core/embed',
    'core-embed/twitter',
    'core-embed/youtube',
    'core-embed/facebook',
    'core-embed/instagram',
    'core-embed/wordpress',
    'core-embed/soundcloud',
    'core-embed/spotify',
    'core-embed/flickr',
    'core-embed/vimeo',
    'core-embed/animoto',
    'core-embed/cloudup',
    'core-embed/collegehumor',
    'core-embed/dailymotion',
    'core-embed/funnyordie',
    'core-embed/hulu',
    'core-embed/imgur',
    'core-embed/issuu',
    'core-embed/kickstarter',
    'core-embed/meetup-com',
    'core-embed/mixcloud',
    'core-embed/photobucket',
    'core-embed/polldaddy',
    'core-embed/reddit',
    'core-embed/reverbnation',
    'core-embed/screencast',
    'core-embed/scribd',
    'core-embed/slideshare',
    'core-embed/smugmug',
    'core-embed/speaker',
    'core-embed/ted',
    'core-embed/tumblr',
    'core-embed/videopress',
    'core-embed/wordpress-tv',
  );
}
add_filter( 'allowed_block_types', 'block_whitelist_allowed_block_types', 10, 2 );



?>
