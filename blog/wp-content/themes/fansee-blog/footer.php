<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0
 * @package Fansee Blog WordPress theme
 */
$show_widget = true;
if( is_page() || is_single() || is_home() ){
	
	$id = fansee_blog_get_page_id();
	
	if( 'on' == get_post_meta( $id, 'fansee-blog-disable-footer-widget', true ) ){
		$show_widget = false;
	}
} 

$show_social_menu = fansee_blog_get( 'footer-social-menu' );
$scroll = fansee_blog_get( 'enable-scroll-to-top' );
$footer_text = fansee_blog_get('footer-copyright-text');
?>
	<section <?php echo fansee_blog_schema( 'footer' ); ?> class="fansee-blog-footer-wrapper">
		<?php if( $show_widget ): ?>
			<div class="container">
				<footer class="fansee-blog-footer-wrapper-inner footer-widget">
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'fansee-blog-footer-widget' ); ?></div>
				</footer>
			</div>
		<?php endif; ?>
		
		<div class="fansee-blog-copyright">
			<div class="container-fluid">
				<div class="fansee-blog-copyright-inner">
					<div class="fansee-blog-copy-right">
						<div class="pr-0">
							<?php echo esc_html( $footer_text ); ?>		
						</div> 
						<div class="fansee-blog-credit-link">						
							<?php esc_html_e( 'Created By:' , 'fansee-blog' ) ?>
							<a class="pl-1" href="<?php echo esc_url( '//www.fanseethemes.com' ); ?>" target="_blank">
								<?php esc_html_e( 'Fansee Themes', 'fansee-blog' ); ?>	                     		
							</a>
						</div>
					</div>

					<?php if( $show_social_menu ): ?>
						<div class="fansee-blog-social-menu">
							<?php fansee_blog_social_menu(); ?>
						</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
	<?php if( $scroll ): ?>
		<div class="fansee-blog-stt scroll-to-top">
			<i class="fa fa-arrow-up"></i>
		</div>
	<?php endif; ?>
	<?php wp_footer(); ?>
 </body>
 </html>