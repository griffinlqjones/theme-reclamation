<?php $the_query = new WP_Query( array('category_name' => 'grid-item')); ?>
<?php if ($the_query->have_posts()) : ?>


  <article class="post-grid 'm-3of4'" role="article">
    <!-- Using article as a wrapper for the grid, list out each post -->

    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

      <?php $post_classes = array('cf', 'post-grid-element') ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
      <?php $the_query->the_title(); ?>
      <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
      <?php
        the_content();

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
        ) );
      ?>

      </div>

    <?php endwhile; ?>
  </article>

<?php else : ?>
  <p>No posts match this category.</p>
<?php endif; ?>
