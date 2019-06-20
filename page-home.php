 <?php /* Template Name: HomePageTemplate */ ?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="about-page" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<!-- <header class="article-header">

								</header> -->
                <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">
                  <div class="screen-bottom-button-wrapper">
                    <a class="screen-bottom-button" href="<?php the_permalink('1664'); ?>">Go To Grid</a>
                  </div>
								</footer>

							</article>

              <?php
                $this_page = get_post();
              ?>

							<?php endwhile; endif; ?>
						</main>

				</div>

			</div>

<?php get_footer(); ?>
