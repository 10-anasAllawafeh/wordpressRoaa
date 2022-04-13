<?php
/**
 * The Header for our theme.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Fansee Blog 1.0 
 */
$preloader = fansee_blog_get( 'pre-loader' );
$search = fansee_blog_get( 'enable-search' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	 	<meta charset="<?php bloginfo( 'charset' ); ?>">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
	 	<?php wp_head(); ?>
	</head>
	<body <?php echo fansee_blog_schema( 'body' ); body_class(); ?> >

	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#site-content">
		<?php esc_html_e( 'Skip to content', 'fansee-blog' ); ?>
	</a>

	<?php if( $preloader ): ?>
		<div id="loader-wrapper" class="fansee-blog-loader-wrapper">
			<svg id="loaded" class="fansee-blog-loader"><circle cx="70" cy="70" r="30" fill="#ddd" style=""></circle></svg>
		</div>
	<?php endif; ?>
	<header id="site-header" <?php echo fansee_blog_schema( 'header' ); ?> class="site-header">
		<div class="container">
			<div class="row header-wrapper">
				<div class="col-12">
					<div class="header-titles">
						<?php the_custom_logo(); ?>
						<div class="site-branding">
							<?php if ( is_front_page() || is_archive() ) :
								?>
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</h1>
								<?php
							else :
								?>
								<p class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</p>
								<?php
							endif;
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="header-navigation-wrapper">
						<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'fansee-blog' ); ?>" role="navigation">
							<?php 
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'echo'           => true,
									'container'      => false,
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'navigation clearfix'
								)); 
							?>
						</nav><!-- .primary-menu-wrapper -->
						<div class="fansee-blog-header-social-wrapper">
							<div class="fansee-blog-social-menu">
								<div class="menu-social-menu-container">
									<?php fansee_blog_social_menu(); ?>
								</div>						
							</div>

							<?php if( $search ): ?>
								<div class="fansee-blog-header-icons">
									<a href="#" class="fansee-blog-search-icon fansee-blog-toggle-search">
										<i class="fa fa-search"></i>
									</a>
								</div>
							<?php endif; ?>	
						</div>	
									
						<a href="#" class="fst-mmenu-toggler" id="menu-toggler">
							<span></span>
						  	<span></span>
						  	<span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
