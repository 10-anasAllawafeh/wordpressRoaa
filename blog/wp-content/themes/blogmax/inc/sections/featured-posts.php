<?php
/**
 * Featured Posts section
 *
 * This is the template for the content of featured_posts section
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */
if ( ! function_exists( 'blogmax_add_featured_posts_section' ) ) :
    /**
    * Add featured_posts section
    *
    *@since  Blogmax 1.0.0
    */
    function blogmax_add_featured_posts_section() {
        $options = blogmax_get_theme_options();
        // Check if featured_posts is enabled on frontpage
        $featured_posts_enable = apply_filters( 'blogmax_section_status', true, 'featured_posts_section_enable' );

        if ( true !== $featured_posts_enable ) {
            return false;
        }
        // Get featured_posts section details
        $section_details = array();
        $section_details = apply_filters( 'blogmax_filter_featured_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render featured_posts section now.
        blogmax_render_featured_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogmax_get_featured_posts_section_details' ) ) :
    /**
    * featured_posts section details.
    *
    * @since  Blogmax 1.0.0
    * @param array $input featured_posts section details.
    */
    function blogmax_get_featured_posts_section_details( $input ) {
        $options = blogmax_get_theme_options();

        // Content type.
        $featured_posts_count = ! empty( $options['featured_posts_count'] ) ? $options['featured_posts_count'] : 2;
        
        $content = array();
        $cat_id = ! empty( $options['featured_posts_content_category'] ) ? $options['featured_posts_content_category'] : '';
        $args = array(
            'post_type'             => 'post',
            'posts_per_page'        => absint( $featured_posts_count ),
            'cat'                   => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = blogmax_trim_content( $options['featured_posts_excerpt_length'] );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// featured_posts section content details.
add_filter( 'blogmax_filter_featured_posts_section_details', 'blogmax_get_featured_posts_section_details' );


if ( ! function_exists( 'blogmax_render_featured_posts_section' ) ) :
  /**
   * Start featured_posts section
   *
   * @return string featured_posts content
   * @since  Blogmax 1.0.0
   *
   */
   function blogmax_render_featured_posts_section( $content_details = array() ) {
        $options                = blogmax_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blogmax_featured_posts_section" class="relative page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html( $options['featured_posts_title'] ); ?></h2>
                </div><!-- .section-header -->

                <div class="section-content">
                    <p><?php echo wp_kses_post( $options['featured_posts_description'] ); ?></p>
                </div><!-- .section-content -->

                <div class="col-3 clear">
                    <?php foreach($content_details as $content) : ?>

                        <article class="<?php echo (has_post_thumbnail( $content['id'] )) ? 'has' : 'no'; ?>-post-thumbnail">
                            <div class="featured-post-item">
                                <div class="entry-meta">
                                    <span class="cat-links">
                                        <?php the_category('', '', $content['id']); ?>
                                    </span><!-- .cat-links -->     
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                </header>

                                <?php if(has_post_thumbnail( $content['id'] ) ): ?>
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                        <a href="<?php echo esc_url($content['url']);?>" class="post-thumbnail-link" title="<?php echo esc_attr($content['title']);?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']);?></p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <span class="posted-on">
                                        <?php blogmax_posted_on($content['id']); ?>
                                    </span><!-- .posted-on -->

                                    <?php if(!empty($options['featured_posts_read_more_btn_label'])) : ?>
                                        <div class="read-more">
                                            <a href="<?php echo esc_url($content['url']); ?>" class="more-link"><?php echo esc_html($options['featured_posts_read_more_btn_label']); ?></a>
                                        </div><!-- .read-more -->
                                    <?php endif; ?>
                                </div><!-- .entry-footer -->
                            </div><!-- .featured-post-item -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .col-3 -->
            </div><!-- .wrapper -->
        </div><!-- #blogmax_featured_posts_section -->
   
    <?php }
endif;  ?>