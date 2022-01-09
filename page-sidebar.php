<?php
/*
 Template Name: Page w/ Sidebar
*/
?>
<!--page-sidebar-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap  row">

						<main id="main" class="col-xs-12 col-sm-8 col-lg-9 " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content " itemprop="articleBody">

									<?php	the_content(); ?>

								</section>


								<footer class="article-footer">

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'dghtheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry ">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'dghtheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'dghtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'Error message', 'dghtheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
