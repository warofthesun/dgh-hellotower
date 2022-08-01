<!-- SINGLE EPK LAYOUT -->
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
<div class="music__content epk">
<div class="music__info col-xs-12 col-md-6">
<div class="hero--image">
  <?php echo do_shortcode( get_field('bandcamp_shortcode') ); ?>
</div>
</div>
<div class="epk__content col-xs-12 col-md-6">
  <ul class="header--links">
    <?php 
    $link = get_field('download_link');
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
      <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
    <?php endif; ?>
  <?php 
  $link = get_field('press_pics');
  if( $link ): 
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
    <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
  <?php endif; ?>
  </ul>
  <?php if( have_rows('details') ): ?>
  <ul class="epk__details">
    <?php while( have_rows('details') ): the_row(); ?>
    <?php if(get_sub_field('release_date')) : ?>
      <li><span>Release:</span> <?php the_sub_field('release_date'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('artist')) : ?>
      <li><span>Artist:</span> <?php the_sub_field('artist'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('title')) : ?>
      <li><span>Title:</span> <?php the_sub_field('title'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('genre')) : ?>
      <li><span>Genre:</span> <?php the_sub_field('genre'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('label')) : ?>
      <li><span>Label:</span> <?php the_sub_field('label'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('upc')) : ?>
      <li><span>UPC:</span> <?php the_sub_field('upc'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('spotify_uri')) : ?>
      <li><span>Spotify URI:</span> <?php the_sub_field('spotify_uri'); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field('apple_id')) : ?>
      <li><span>Apple ID:</span> <?php the_sub_field('apple_id'); ?></li>
    <?php endif; ?>
     
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
  <div class="epk__body-copy">
    <?php the_field('body_copy'); ?>
  </div>
</div>
</div>
<footer class="article-footer ">

  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title"><i class="fas fa-hashtag"></i>' . __( '', 'dghtheme' ) . '</span> ', ' | ', '</p>' ); ?>

</footer>
