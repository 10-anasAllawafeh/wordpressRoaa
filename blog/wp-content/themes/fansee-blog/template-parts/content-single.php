<?php
/**
 * The default template for displaying content
 * Used for post or page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since Fansee Blog 1.0
 */

$show_date = fansee_blog_get( 'post-date' );
$show_author = fansee_blog_get( 'post-author' );
$show_category = fansee_blog_get( 'post-category' );
?>
<article <?php post_class(); ?> <?php echo fansee_blog_schema( 'article' ); ?> id="post-<?php the_ID(); ?>">
	<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'fansee-blog' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>'
		));
	?>

	<?php if( 'post' == get_post_type() && ( $show_date || $show_author || $show_category ) ): ?>
		<div class="entry-meta">
			
			<?php if( $show_date || $show_author ): ?>
					<?php
						fansee_blog_the_date();			
						fansee_blog_posted_by();
					?>
			<?php endif; ?>
			<?php fansee_blog_category(); ?>

			<?php fansee_blog_tag_list(); ?>
		</div>
	<?php endif; ?>
		
	<?php
		# If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		
		if( 'post' == get_post_type() ){

			the_post_navigation( array(
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'fansee-blog' ) . '</span><span class="nav-title">%title</span>',
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'fansee-blog' ) . '</span><span class="nav-title">%title</span>',
			));
		}
	?>
</article>