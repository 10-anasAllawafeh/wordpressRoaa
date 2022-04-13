<?php
/**
 * Blog section
 *
 * This is the template for the content of latest_post section
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */
if ( ! function_exists( 'blogmax_add_latest_posts_section' ) ) :
    /**
    * Add latest_post section
    *
    *@since  Blogmax 1.0.0
    */
    function blogmax_add_latest_posts_section() {
        $options = blogmax_get_theme_options();
        // Check if latest_post is enabled on frontpage
        $latest_posts_enable = apply_filters( 'blogmax_section_status', true, 'latest_posts_section_enable' );

        if ( true !== $latest_posts_enable ) {
            return false;
        }
        // Get latest_post section details
        $section_details = array();
        $section_details = apply_filters( 'blogmax_filter_latest_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render latest_post section now.
        blogmax_render_latest_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogmax_get_latest_posts_section_details' ) ) :
    /**
    * latest_post section details.
    *
    * @since  Blogmax 1.0.0
    * @param array $input latest_post section details.
    */
    function blogmax_get_latest_posts_section_details( $input ) {
        $options = blogmax_get_theme_options();

        // Content type.
        $latest_posts_content_type  = $options['latest_posts_content_type'];
        $latest_posts_count = ! empty( $options['latest_posts_count'] ) ? $options['latest_posts_count'] : 3;
        
        
        $content = array();
        $cat_ids = ! empty( $options['latest_posts_category_exclude'] ) ? $options['latest_posts_category_exclude'] : array();
        $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => absint( $latest_posts_count ),
                'category__not_in'      => ( array ) $cat_ids,
                'ignore_sticky_posts'   => true,
            );          

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = blogmax_trim_content( 30);
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
// latest_posts section content details.
add_filter( 'blogmax_filter_latest_posts_section_details', 'blogmax_get_latest_posts_section_details' );


if ( ! function_exists( 'blogmax_render_latest_posts_section' ) ) :
  /**
   * Start latest_post section
   *
   * @return string latest_post content
   * @since  Blogmax 1.0.0
   *
   */
   function blogmax_render_latest_posts_section( $content_details = array() ) {
        $options                = blogmax_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
    
        <div id="blogmax_latest_posts_section" class="relative page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html( $options['latest_posts_sub_title'] ); ?></p>
                    <h2 class="section-title"><?php echo esc_html( $options['latest_posts_title'] ); ?></h2>
                </div><!-- .section-header -->

                <div class="archive-blog-wrapper grid <?php echo esc_attr( $options['latest_posts_column'] ); ?> clear">
                    <?php foreach($content_details as $content): ?>
                        <article class="grid-item">
                            <div class="post-item-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                    <a href="<?php echo esc_url($content['url']);?>" class="post-thumbnail-link" title="<?php echo esc_attr($content['title']);?>"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php the_category('', '', $content['id'])?>
                                        </span><!-- .cat-links -->     
                                    </div><!-- .entry-meta -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post($content['excerpt']);?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div><!-- .archive-blog-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #blogmax_latest_posts_section -->

    <?php }
endif;  ?>
