<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage  Blogmax
* @since  Blogmax 1.0.0
*/

if ( ! function_exists( 'blogmax_validate_long_excerpt' ) ) :
    function blogmax_validate_long_excerpt( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'blogmax' ) );
        } elseif ( $value < 5 ) {
            $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'blogmax' ) );
        } elseif ( $value > 100 ) {
            $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'blogmax' ) );
        }
        return $validity;
    }
endif;

if ( ! function_exists( 'blogmax_validate_latest_posts_count' ) ) :
    function blogmax_validate_latest_posts_count( $validity, $value ){
           $value = intval( $value );
       if ( empty( $value ) || ! is_numeric( $value ) ) {
           $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'blogmax' ) );
       } elseif ( $value < 2) {
           $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'blogmax' ) );
       } elseif ( $value > 12 ) {
           $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'blogmax' ) );
       }
       return $validity;
    }
endif;
