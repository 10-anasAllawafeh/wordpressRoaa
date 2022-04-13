<?php
/**
 * Customizer Control: Dropdown Categories
 * @since Fansee Blog 1.0
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Fansee_Blog_Customizer_Dropdown_Categories_Control extends WP_Customize_Control {

		/**
		* The control type.
		*
		* @access public
		* @var string
		*/
		public $type = 'fansee-blog-dropdown-categories';

		
		public function render_content() {
	        $dropdown_categories = wp_dropdown_categories(
	            array(
	                'name'  => $this->id,
	                'echo'  => 0,
	                'order' => 'DESC',
	                'selected' => $this->value()
	            )
	        );
	        $dropdown_final = str_replace( '<select', '<select ' . $this->get_link(), $dropdown_categories );

	        printf(
	            '<label>
	                <span class="customize-control-title">%s</span>
	                <span class="customize-control-description">%s</span>
	                %s
	            </label>',
	            $this->label,
	            $this->description,
	            $dropdown_final
	        );
	    }
	}
}
