<!-- SINGLE MUSIC LAYOUT -->
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
  <?php //printf( '<p class="header-category"><i class="fas fa-album-collection"></i>' . __('', 'dghtheme' ) . ' %1$s</p>' , get_the_category_list(' | ') ); ?>

</header>
<div class="music__content">
<div class="music__info col-xs-12 col-md-6">
<div class="hero--image"><?php the_post_thumbnail('medium'); ?></div>
<div class="credits">
  <?php the_field('musicians'); ?>
</div>
  <?php 
    if( have_rows('social_platforms') ): ?>
    <ul class="social_platforms">
      <?php while( have_rows('social_platforms') ) : the_row(); ?>
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
  
          
      <?php endwhile;
  
    elseif( have_rows('social_platforms_default', 'option') ): ?>
    <ul class="social_platforms">
      
      <?php while( have_rows('social_platforms_default', 'option') ) : the_row(); ?>
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
  <?php endif;  ?>

</div>
<div class="music__links col-xs-12 col-md-6">
  <?php if( have_rows('music_platforms') ): ?>
    <ul class="music_platforms">
      <?php while( have_rows('music_platforms') ) : the_row(); ?>
      
        <?php 
        $link = get_sub_field('platform_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
            <li>
              <?php
                $platform = get_sub_field( 'platform' );
              ?>
              <img src="<?php echo get_template_directory_uri(); ?>/library/images/platforms/<?php echo esc_attr($platform['value']); ?>.png">
              <h4 class="platform" style="display:block; margin-left: 1em;"><?php echo esc_html($platform['label']); ?></h4>
              <i class="fas fa-caret-square-right"></i>
            </li>
          </a>
        <?php endif; ?>
      
      <?php endwhile; ?>
      </ul>
  <?php endif;  ?>
</div>
</div>
<footer class="article-footer ">

  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title"><i class="fas fa-hashtag"></i>' . __( '', 'dghtheme' ) . '</span> ', ' | ', '</p>' ); ?>

</footer>
