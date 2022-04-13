<?php
/**
 * Promotion section
 *
 * This is the template for the content of Promotion section
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */
if ( ! function_exists( 'blogmax_add_promotion_section' ) ) :
    /**
    * Add Promotion section
    *
    *@since  Blogmax 1.0.0
    */
    function blogmax_add_promotion_section() {
        $options = blogmax_get_theme_options();
        
        // Check if Promotion is enabled on frontpage
        $promotion_enable = apply_filters( 'blogmax_section_status', true, 'promotion_section_enable' );

        if ( true !== $promotion_enable ) {
            return false;
        }

        // Get Promotion section details
        $section_details = array();
        $section_details = apply_filters( 'blogmax_filter_promotion_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return;
        }

        // Render Promotion section now.
        blogmax_render_promotion_section( $section_details[0] );
    }
endif;

if ( ! function_exists( 'blogmax_get_promotion_section_details' ) ) :
    /**
    * Promotion section details.
    *
    * @since  Blogmax 1.0.0
    * @param array $input Promotion section details.
    */
    function blogmax_get_promotion_section_details( $input ) {
        $options = blogmax_get_theme_options();

        $promotion_content_type  = $options['promotion_content_type']; // Promotion content type
        
        $content = array();
        switch ( $promotion_content_type ) {
        	
            case 'page':
                $page_id = ! empty( $options['promotion_content_page'] ) ? $options['promotion_content_page'] : '';
                $args = array(
                    'post_type'             => 'page',
                    'posts_per_page'        => 1,
                    'p'                     => $page_id,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'post':
                $page_id = ! empty( $options['promotion_content_post'] ) ? $options['promotion_content_post'] : '';

                $args = array(
                    'post_type'             => 'post',
                    'p'                     => $page_id,
                    'posts_per_page'        => 1,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
            case 'custom':
                $page_post['title']     = isset($options['promotion_custom_title'])? $options['promotion_custom_title']: '';
                $page_post['url']       = isset($options['promotion_us_btn_url']) ? $options['promotion_us_btn_url']: '#';
                $page_post['image']     = !empty($options['promotion_custom_image']) ? $options['promotion_custom_image']: get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                array_push( $content, $page_post );
                return $content;

            default:
            break;
        }
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg';

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

// Promotion section content details.
add_filter( 'blogmax_filter_promotion_section_details', 'blogmax_get_promotion_section_details' );


if ( ! function_exists( 'blogmax_render_promotion_section' ) ) :
  /**
   * Start Promotion section
   *
   * @return string Promotion content
   * @since  Blogmax 1.0.0
   *
   */
   function blogmax_render_promotion_section( $content_details = array() ) {
        $options    = blogmax_get_theme_options();
        $btn_label  = $options['promotion_read_more'];

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="blogmax_promotion_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $content_details['image'] ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <article>
                    <div class="section-container">
                        <div class="section-header">
                            <p class="section-subtitle"><?php echo $options['promotion_sub_title']; ?></p>
                            <h2 class="section-title"><?php echo esc_html($content_details['title']); ?></h2>
                        </div><!-- .section-header -->

                        <?php if( !empty($btn_label) && !empty( $content_details['url'] )) : ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content_details['url'] ); ?>" class="btn"><?php echo esc_html($btn_label); ?></a>
                            </div><!-- .read-more -->
                        <?php endif; ?>

                    </div><!-- .section-container -->
                </article>
            </div><!-- .wrapper -->
        </div><!-- #blogmax_promotion_section -->

    <?php }
endif;