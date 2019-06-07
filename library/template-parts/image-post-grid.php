<?php
$catQuery = new WP_Query( array(
  'post_type' => 'person',
  'post_status' => 'publish',
  'posts_per_page' => 99,
  'meta_key' => 'grid_position',
  'orderby' => 'meta_value_num',
  'order' => 'DESC'
));
?>

<?php if ($catQuery->have_posts()) : ?>

  <article class="post-grid" role="article">
    <!-- Using article as a wrapper for the grid, list out each post -->

    <?php while ($catQuery->have_posts()) : $catQuery->the_post(); ?>

      <?php $post_classes = array('post-grid-item grid-item-link' ); ?>

      <a id="post-<?php the_ID(); ?>"
        <?php post_class( $post_classes ); ?>
        href="<?php the_permalink(); ?>"
        data-gridsize="<?php the_field('grid_size'); ?>"
        data-gridposition="<?php the_field('grid_position'); ?>"
        >
        <div class="entry-title-wrapper">
          <div class="title-line-decoration"></div>
          <p class="entry-title"><?php the_title(); ?></p>
        </div>
        <p class="order-label"></p>
        <figure class="grid-picture-wrapper image-wrapper">
          <img src="<?php the_field('person_portrait'); ?>" alt="">
        </figure>

      </a>

    <?php endwhile; ?>
  </article>

  <div class="screen-bottom-button-wrapper">
    <a class="screen-bottom-button" href="#inner-header">Return To Top</a>
  </div>

<?php else : ?>
  <p>No posts match this category.</p>
<?php endif; ?>
