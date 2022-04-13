<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

$options = blogmax_get_theme_options();
?>
<article id="post-<?php the_ID(); ?> grid-item">
    <div class="post-item-wrapper">
        <div class="featured-image" style="background-image: url('<?php echo (has_post_thumbnail( )) ? the_post_thumbnail_url( 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg' ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
        </div>

       <div class="entry-container">
            <div class="entry-meta">
                 <span class="cat-links">
                    <?php the_category('', ''); ?>
                </span><!-- .cat-links -->          
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content"><?php the_excerpt(); ?></div>
            
        </div><!-- .entry-container -->
    </div>
</article>
