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
								<div class="hero--image"><?php the_post_thumbnail('gallery-image'); ?></div>
								<header class="article-header">

									<p class="byline entry-meta vcard">
												<?php printf( __( '', 'dghtheme' ).' %1$s %2$s',
												/* the time the post was published */
												'<time class="updated entry-time" datetime="' . get_the_time('y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
												/* the author of the post */
												'<span class="by">'.__( '|', 'dghtheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link() . '</span>'
										); ?>
									</p>
									<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<?php printf( '<p class="header-category"><i class="fas fa-album-collection"></i>' . __('', 'dghtheme' ) . ' %1$s</p>' , get_the_category_list(' | ') ); ?>

								</header>

								<section class="entry-content ">
									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer ">

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title"><i class="fas fa-hashtag"></i>' . __( '', 'dghtheme' ) . '</span> ', ' | ', '</p>' ); ?>

								</footer>

							</article>
							</div>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

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
