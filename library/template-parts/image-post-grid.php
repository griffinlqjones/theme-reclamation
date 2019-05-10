<?php $catQuery = new WP_Query( array('category_name' => 'grid-item')); ?>
<?php if ($catQuery->have_posts()) : ?>
  <?php
  $counter = 0;
  $overlayColors = array(
    'c-grid-overlay-1',
    'c-grid-overlay-2',
    'c-grid-overlay-3',
    'c-grid-overlay-4');
    ?>

    <article class="post-grid" role="article">
      <!-- Using article as a wrapper for the grid, list out each post -->

      <?php while ($catQuery->have_posts()) : $catQuery->the_post(); ?>

        <?php $postClasses = array('post-grid-element'); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class( $postClasses ); ?>>
          <?php $catQuery->the_title(); ?>
          <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
          <?php
          the_content();
          ?>

          <div class="grid-post-overlay <?php echo $overlayColors[$counter]; ?>" > </div>

          <?php
          if ($counter >= 3) {
            $counter = 0;
          }
          else {
            $counter++;
          }
          ?>

        </div>

      <?php endwhile; ?>
    </article>

  <?php else : ?>
    <p>No posts match this category.</p>
  <?php endif; ?>
