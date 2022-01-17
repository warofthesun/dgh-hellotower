<!--archive- music post-->
	<?php get_header(); ?>
	
				<div id="content">
	
					<div id="inner-content" class="wrap  row">
	
						<main id="main" class="col-xs-12 row music__content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<div class="left col-xs-12 col-md-6">
								<div class="hero--image hero--image__music">
									<?php
									
									$image = get_field('cover_photo', 'options');
									
									if( !empty($image) ):
										// vars
										$url = $image['url'];
										$title = $image['title'];
										$alt = $image['alt'];
										$caption = $image['caption'];
									
										// thumbnail
										$size = 'large';
										$thumb = $image['sizes'][ $size ];
										$width = $image['sizes'][ $size . '-width' ];
										$height = $image['sizes'][ $size . '-height' ]; ?>
									
										<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
									
									<?php endif; ?>
								</div>
								<div>
									<?php the_field('body_content', 'options'); ?>
								</div>
								<?php 
								if( have_rows('social_platforms_music', 'options') ): ?>
								<ul class="social_platforms">
									<?php while( have_rows('social_platforms', 'options') ) : the_row(); ?>
									<li>
										<?php 
										$link = get_sub_field('platform_link');
										if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/platforms/<?php the_sub_field('platform'); ?>.png"></a>
										<?php endif; ?>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>
							<div class="right col-xs-12 col-md-6">
									<?php if (have_posts()) : ?>
									<ul class="music_platforms">
										<?php while (have_posts()) : the_post(); ?>
										<a href="<?php the_permalink(); ?>">
										<li>
											
											<?php the_post_thumbnail('medium'); ?>
											<h4 class="platform" style="display:block; margin-left: 1em;"><?php the_title(); ?></h4>
											<i class="fas fa-caret-square-right"></i>
										</li>
										</a>
									<?php endwhile; ?>
									</ul>
									<?php endif; ?>
							</div>
	
							</main>
	
					</div>
	
				</div>
	
	<?php get_footer(); ?>
	