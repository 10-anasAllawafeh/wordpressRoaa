<?php
/*
 Template Name: Fansee Blog Full Width
*/

 get_header(); ?>
 <main id="site-content" role="main">
	<div id="primary" class="content-area">
		<?php
			if ( have_posts() ) {
			 	// Load posts loop.
			 	while ( have_posts() ){
			 		the_post(); 
			 		the_content();
			 	}
			 }
		?>
	</div>
</main>
 <?php get_footer();