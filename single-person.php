<?php get_header(); ?>

<div id="content">


  <!-- <div class="profile-page-header">
    <?php get_template_part('library/template-parts/site-badge'); ?>

    <?php get_template_part('library/template-parts/wpm-lang-switch'); ?>
  </div> -->


  <main id="main" class="single-post" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="profile-wrapper">
        <div class="profile-heading-wrapper">
          <h1 class="profile-heading"><?php the_title(); ?></h1>
          <h2 class="profile-subheading"><?php the_field('person_occupation'); ?></h2>
          <?php
          if( get_field('feature_quote')) {
            echo '<blockquote class="feature-quote">' . get_field('feature_quote') . '</blockquote>';
          }
          ?>
        </div>
        <div class="profile-picture-wrapper-outer">
          <button class="profile-picture-wrapper-inner image-wrapper light-box-button">
            <img src="<?php the_field('person_portrait'); ?>" alt="Portrait of a person">
          </button>
        </div>
      </div>



      <?php
      /* Bio Section */
      if (get_field('bio_section')) {
        echo '<div class="bio-section-container">';
        echo '<h4 class="bio-section-lead">About ' . explode(' ', get_the_title())[0] . '</h4>';
        echo '<p>' . get_field('bio_section') .'</p>';
        echo '</div>';
      }
      ?>

      <?php
      /* Body Text */
      if(get_field('body_text')) {
        echo '<div class="body-text-container">';
        the_field('body_text');
        echo '</div>';
      }
      ?>


      <?php
      /* Modal lightbox */
      if(has_blocks()) {
        get_template_part('library/template-parts/single-post-modal');
      }
      ?>


    <?php endwhile; ?>

  <?php else : ?>

    <article id="post-not-found" class="hentry cf">
      <header class="article-header">
        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
      </header>
      <section class="entry-content">
        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
      </section>
      <footer class="article-footer">
        <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
      </footer>
    </article>

  <?php endif; ?>

  <div class="screen-bottom-button-wrapper">
    <a class="screen-bottom-button" href="<?php echo get_home_url(); ?>">Return Home</a>
  </div>

</main>


</div>

<?php get_footer(); ?>
