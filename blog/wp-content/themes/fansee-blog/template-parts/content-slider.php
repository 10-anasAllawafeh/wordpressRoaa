<div class="fansee-blog-feature-news-slider">
	<div class="fansee-blog-feature-news-slider-init">
		<?php 
			$cat_id = fansee_blog_get( 'blog-featured-posts' );
			if( $cat_id > 0 ){

				$args = apply_filters( 'fansee_blog_featured_posts_args', array(
					'post_type' => 'post',
					'cat' => $cat_id,
					'posts_per_page' => 3
				));
				$query = new WP_Query( $args );
				$show_category = fansee_blog_get( 'post-category' );
				if( $query->have_posts() ){
					while( $query->have_posts() ){
						$query->the_post();
						$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_theme_file_uri( 'assets/img/default-image.jpg' );
						?>
						<div class="fansee-blog-feature-news-content" >
							<div class="fansee-blog-feature-news-inner-content">
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<?php 
									if(  $show_category ){
										fansee_blog_category(); 
									} 
									the_excerpt(); 
								?>
								<a href="<?php the_permalink(); ?>" class="fansee-blog-btn-primary"><span><?php _e( 'Read More', 'fansee-blog' ); ?></span></a>
							</div>
							<div class="fansee-blog-feature-news-inner-image" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>)"></div>
						</div> <!-- slider loop -->
						<?php
					}
				}
				wp_reset_postdata();
			}
		?>
	</div> <!-- slider init -->
</div>