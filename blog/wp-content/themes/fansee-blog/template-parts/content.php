<?php
/**
 * The default template for displaying content
 *
 * Used for both index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Fansee Blog
 * @since Fansee Blog 1.0
 */

$cls = fansee_blog_has_sidebar() ? 'col-md-6 col-lg-6' : 'col-md-4 col-lg-4';
$show_date = fansee_blog_get( 'post-date' );
$show_author = fansee_blog_get( 'post-author' );
$show_category = fansee_blog_get( 'post-category' );
?>
<div class="<?php echo esc_attr( $cls ); ?>">
	<div class="fansee-blog-post">
		<article <?php post_class(); ?> <?php echo fansee_blog_schema( 'article' ); ?> id="post-<?php the_ID(); ?>">
			<figure class="featured-media">
				<?php
					$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_theme_file_uri( 'assets/img/default-image.jpg' );
				?>
				<div class="featured-media-image" style="background-image: url( '<?php echo esc_url( $thumbnail ); ?>')"></div>
			</figure>

			<?php if( $show_date ): ?>
				<div class="fansee-blog-date">
					<a href="<?php echo esc_url( fansee_blog_get_date_link() ); ?>">
					    <span class="day"><?php  echo esc_html( get_the_date('d') ); ?></span>
					    <span class="month"><?php  echo esc_html( get_the_time('M') ); ?></span>
				    </a>
				</div>
			<?php endif; ?>
			
			<div class="post-content-inner">
				<header class="entry-header">
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</header>
				
				<?php if( $show_author || $show_category ): ?>
					<div class="entry-meta fansee-blog-entry-meta">
						<?php fansee_blog_author_image(); ?>
						<?php fansee_blog_posted_by(); ?>
						<?php fansee_blog_category(); ?>
					</div>
				<?php endif; ?>
				<div class="post-content-wrap">		
					<?php the_excerpt(); ?>
				</div>
			</div>
		</article>
	</div>
</div>