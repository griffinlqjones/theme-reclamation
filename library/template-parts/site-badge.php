<a class="site-badge home-link" href="<?php
if(is_home() || is_page_template( 'page-grid.php' )) {
  echo get_home_url();;
}
elseif (is_single()) {
  echo the_permalink( '1664' );
}
else {
  echo get_home_url();
}
?>">
  <p class=""><?php bloginfo( 'name' ); ?></p>
  <p class="">99</p>
</a>
