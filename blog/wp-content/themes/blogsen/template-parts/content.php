<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BlogBell
 */
?>
<article id="post-<?php the_ID(); ?>"  class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?> ">
	<div class="post-item">
			<?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full');?>');">
                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                </div><!-- .featured-image -->
            <?php endif; ?>

		<div class="entry-container">
			<div class="entry-meta">
				<?php blogbell_entry_meta(); ?>
				<?php blogbell_posted_on(); ?>
			</div><!-- .entry-meta -->
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>

				
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
