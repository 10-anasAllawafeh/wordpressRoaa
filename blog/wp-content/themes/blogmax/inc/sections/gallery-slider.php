<?php
/**
 * Banner section
 *
 * This is the template for the content of hero slider section
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */
if ( ! function_exists( 'blogmax_add_gallery_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since  Blogmax 1.0.0
    */
    function blogmax_add_gallery_slider_section() {
    	$options = blogmax_get_theme_options();
        // Check if slider is enabled on frontpage
        $gallery_slider_enable = apply_filters( 'blogmax_section_status', true, 'gallery_slider_section_enable' );

        if ( true !== $gallery_slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'blogmax_filter_gallery_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        blogmax_render_gallery_slider_section( $section_details );
}

endif;

if ( ! function_exists( 'blogmax_get_gallery_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since  Blogmax 1.0.0
    * @param array $input slider section details.
    */
    function blogmax_get_gallery_slider_section_details( $input ) {
        $options = blogmax_get_theme_options();

        // Content type.
        $gallery_slider_count           = ! empty( $options['gallery_slider_count'] ) ? $options['gallery_slider_count'] : 4;
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= $gallery_slider_count; $i++ ) {
            if ( ! empty( $options['gallery_slider_content_page_' . $i] ) )
                $page_ids[] = $options['gallery_slider_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $gallery_slider_count ),
            'orderby'           => 'post__in',
            );                    
    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'blogmax_filter_gallery_slider_section_details', 'blogmax_get_gallery_slider_section_details' );


if ( ! function_exists( 'blogmax_render_gallery_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since  Blogmax 1.0.0
   *
   */
   function blogmax_render_gallery_slider_section( $content_details = array() ) {
        $options = blogmax_get_theme_options();
        $gallery_slider_autoplay_enable = ($options['gallery_slider_autoplay_enable']) ? 'true' : 'false';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blogmax_gallery_slider_section" class="relative">
            <div class="wrapper">
                <div class="gallery-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 500, "dots": false, "arrows": true, "autoplay": <?php echo esc_attr( $gallery_slider_autoplay_enable ); ?>, "draggable": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link" title="<?php echo esc_attr( $content['title'] ); ?>"></a>
                            </div><!-- .featured-image -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .gallery-slider -->
            </div><!-- .wrapper -->
        </div><!-- #blogmax_gallery_slider_section -->

<?php
    }    
endif;