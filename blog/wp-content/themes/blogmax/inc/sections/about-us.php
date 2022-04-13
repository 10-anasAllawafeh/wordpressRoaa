<?php
/**
 * Banner section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */
if ( ! function_exists( 'blogmax_add_about_us_section' ) ) :
    /**
    * Add about section
    *
    *@since Blogmax 1.0.0
    */
    function blogmax_add_about_us_section() {
    	$options = blogmax_get_theme_options();
        // Check if about is enabled on frontpage
        $about_us_enable = apply_filters( 'blogmax_section_status', true, 'about_us_section_enable' ) ;
        
        if ( true !== $about_us_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'blogmax_filter_about_us_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return ;
        }

        // Render about section now.
        blogmax_render_about_us_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogmax_get_about_us_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Blogmax 1.0.0
    * @param array $input about section details.
    */
    function blogmax_get_about_us_section_details( $input ) {
        $options = blogmax_get_theme_options();

        $content = array();

        $page_id = '';
        if ( ! empty( $options['about_us_content_page'] ) )
            $page_id = isset($options['about_us_content_page']) ? $options['about_us_content_page'] : '' ;

        $args = array(
                'post_type'             => 'page',
                'p'                     =>  absint( $page_id ),
                'ignore_sticky_posts'   => true,
            );

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['excerpt']   = blogmax_trim_content($options['about_us_excerpt_length']);
                $page_post['title']     = get_the_title();
                $page_post['sub_title'] = isset($options['about_us_custom_sub_title'])? $options['about_us_custom_sub_title']: '';
                $page_post['url']       = get_the_permalink( );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// about section content details.
add_filter( 'blogmax_filter_about_us_section_details', 'blogmax_get_about_us_section_details' );


if ( ! function_exists( 'blogmax_render_about_us_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Blogmax 1.0.0
   *
   */
   function blogmax_render_about_us_section( $content_details = array() ) {
        $options        = blogmax_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <?php $content = $content_details[0];?>

        <div id="blogmax_about_us_section" class="relative page-section same-background">
            <div class="wrapper">
                <article>
                    <div class="section-header">
                        <p class="section-subtitle"><?php echo esc_html($content['sub_title']); ?></p>
                        <h2 class="section-title"><?php echo esc_html($content['title']); ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content">
                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                    </div><!-- .section-content -->

                    <?php if(!empty($options['about_us_btn_txt']) ) : ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html($options['about_us_btn_txt']); ?></a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </article>
            </div><!-- .wrapper -->
        </div><!-- #blogmax_about_us_section -->

    <?php
    }    
endif;
