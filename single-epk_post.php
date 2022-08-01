<!--single-epk post-->
<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap  row">

		<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post__container">
					<article id="post-<?php the_ID(); ?>" <?php post_class('cf, epk_post'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

						<?php include 'inc/epk-single-layout.php'; ?>

					</article>
				</div>
			<?php endwhile; ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry ">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'dghtheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'dghtheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single - music post template.', 'dghtheme' ); ?></p>
						</footer>
				</article>

			<?php endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>
