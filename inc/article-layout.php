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
<div class="hero--image"><?php the_post_thumbnail('featured-image'); ?></div>
<section class="entry-content ">
  <?php the_content(); ?>
</section>

<footer class="article-footer ">

  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title"><i class="fas fa-hashtag"></i>' . __( '', 'dghtheme' ) . '</span> ', ' | ', '</p>' ); ?>

</footer>
