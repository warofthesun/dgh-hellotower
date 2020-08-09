<!--front-page-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php $args = array(
					       'post_type' => array('post','custom_type'),
					       'post_status' => 'publish',
					       'posts_per_page' => -1,
					       'orderby' => 'date',
					       'order' => 'DSC',
					   );

					   $loop = new WP_Query( $args );

					   if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
						 <div class="post__container">
							<article id="post-<?php the_ID(); ?>" <?php post_class( ' single-post wrap' ); ?> role="article">

								<?php include 'inc/article-layout.php'; ?>

							</article>
							</div>

							<?php endwhile; ?>

									<?php dgh_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry ">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'dghtheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'dghtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'dghtheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
