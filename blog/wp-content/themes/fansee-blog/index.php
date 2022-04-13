<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since Fansee Blog 1.0
 */
get_header(); 

$cls = fansee_blog_has_sidebar() ? 'col-md-8 col-lg-8' : 'col-12';  
get_template_part( 'template-parts/content', 'banner' );
?>
<div class="container">
	<main id="site-content" role="main">
		<?php 
			if( is_home() ){
				get_template_part( 'template-parts/content', 'slider' ); 
			}
		?>
		<div class="row">
			<div class="<?php echo esc_attr( $cls ); ?>">
				<div id="primary" class="content-area">
						<?php if ( have_posts() ): ?>
							<div class="row">
								<?php
									while ( have_posts() ){
										the_post(); 
										get_template_part( 'template-parts/content', '' );
									}
								?>
								<div class="col-12">
									<?php
										the_posts_pagination(
											array(
												'mid_size'  => 2,
												'prev_text' => esc_html__( 'Previous', 'fansee-blog' ),
												'next_text' => esc_html__( 'Next', 'fansee-blog' ),
											)
										);
									?>
								</div>
							</div>
						<?php else: ?>
							<?php # If no content, include the "No posts found" template.
								get_template_part( 'template-parts/content', 'none' );
							?>
						<?php endif; ?>
				</div><!-- .content-area -->
			</div>
			<?php if( fansee_blog_has_sidebar() ): ?>
				<div class="col-md-4 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</main><!-- .site-main -->
</div>	
<?php get_footer() ?>