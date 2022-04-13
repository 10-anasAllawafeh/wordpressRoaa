<?php
/**
 * theme options
 * @since Fansee Blog 1.0
 */
if( !class_exists( 'Fansee_Blog_Theme_Options_Customizer' ) ){
	class Fansee_Blog_Theme_Options_Customizer extends Fansee_Blog_Customizer{

		public $fields = array();

		public function __construct( $panel ){

			$this->fields = array(
				
				array(
				    'id'     => 'typography',
				    'title'  => esc_html__( 'Typography','fansee-blog' ),
				    'fields' => $this->typography_options()
				),
				array(
				    'id'     => 'color-section',
				    'title'  => esc_html__( 'Color' ,'fansee-blog' ),
				    'fields' => $this->color_options()
				),
				array(
				    'id'     => 'header_image', //default section
				    'fields' => $this->header_options()
				),
				array(
				    'id'     => 'breadcrumb-section',
				    'title'  => esc_html__( 'Breadcrumb' ,'fansee-blog' ),
				    'fields' => $this->breadcrumb_options()
				),
				array(
				    'id'     => 'sidebar-section',
				    'title'  => esc_html__( 'Sidebar', 'fansee-blog' ),
				    'fields' => $this->sidebar_options()
				),            
				array(
				    'id'     => 'post-section',
				    'title'  => esc_html__( 'Blog', 'fansee-blog' ),
				    'fields' => $this->post_options()
				),                
				array(
				    'id'     => 'footer-section',
				    'title'  => esc_html__( 'Footer', 'fansee-blog' ),
				    'fields' => $this->footer_options()
				),
				array(
				    'id'     => 'advanced-options-section',
				    'title'  => esc_html__( 'Advanced', 'fansee-blog' ),
				    'fields' => $this->advanced_options()
				)
			);

			$this->add( $panel );
		}

		public static function get_fonts(){
			$fonts = fansee_blog_get_fonts();
			$f = array();
			foreach( $fonts as $k => $v ){
				$f[$k] = $v['family'];
			}

			return $f;
		}

		public function typography_options(){
	        $message = esc_html__( 'The value is in px.', 'fansee-blog' );
	        return array(  
	            array(
	                'id'          => 'site-info-font',
	                'label'       => esc_html__( 'Site Identity Font Family', 'fansee-blog' ),
	                'description' => esc_html__( 'Font family for site title and tagline. Defaults to Hind', 'fansee-blog' ),
	                'default'     => 'hind',
	                'type'        => 'select',
	                'choices'     => self::get_fonts(),
	            ),
	            array(
	                'id'      => 'body-font',
	                'label'   =>  esc_html__( 'Body Font Family.', 'fansee-blog' ),
	                'description' => esc_html__( 'Defaults to Hind.', 'fansee-blog' ),
	                'default' => 'hind',
	                'type'    => 'select',
	                'choices' => self::get_fonts(),
	            ),
	            array(
	                'id'          => 'heading-font',
	                'label'       =>  esc_html__( 'Headings Font Family.', 'fansee-blog' ),
	                'description' =>  esc_html__( 'h1 to h6. Defaults to Quicksand.', 'fansee-blog' ),
	                'default'     => 'quicksand',
	                'type'        => 'select',
	                'choices'     => self::get_fonts(),
	            )
	        );
	    }

	    public function color_options(){	
			return array(
				array(
					'id'      => 'primary-color',
					'label'   => esc_html__( 'Primary Color', 'fansee-blog' ),
					'default' => '#1a55cb',
					'type'    => 'color',
				),
				array(
					'id'      => 'body-paragraph-color',
					'label'   => esc_html__( 'Body Text Color', 'fansee-blog' ),
					'default' => '#5f5f5f',
					'type'    => 'color',
				),
				array(
					'id'      => 'link-color',
					'label'   => esc_html__( 'Link Color', 'fansee-blog' ),
					'default' => '#145fa0',
					'type'    => 'color',
				),
				array(
					'id'      => 'link-hover-color',
					'label'   => esc_html__( 'Link Hover Color', 'fansee-blog' ),
					'default' => '#737373',
					'type'    => 'color',
				),
			);
		}

		public function breadcrumb_options(){	
			return array(
				array(
				    'id'	  => 'show-breadcrumb',
				    'label'   => esc_html__( 'Show Breadcrumb', 'fansee-blog' ),
				    'default' => true,
				    'type'    => 'toggle',
				)
			);
		}

		public function sidebar_options(){
			return array(
				array(
				'id'      => 'sidebar-position',
				'label'   => esc_html__( 'Sidebar' , 'fansee-blog' ),
				'type'    => 'select',
				'default' => 'show',
				'choices' => array(
				    'show' => esc_html__( 'Show' , 'fansee-blog' ),
				    'hide' => esc_html__( 'Hide', 'fansee-blog' ),
				)
			));
		}

		public function post_options(){
			return array(
				array(
					'id' => 'blog-featured-posts',
					'label' => esc_html__( 'Featured Posts', 'fansee-blog' ),
					'type'  => 'dropdown-categories',
					'default' => 1
				),
	            array(
	                'id'      => 'post-category',
	                'label'   =>  esc_html__( 'Show Categories or Tags', 'fansee-blog' ),
	                'default' => true,
	                'type'    => 'toggle',
	            ),
	            array(
	                'id'      => 'post-date',
	                'label'   => esc_html__( 'Show Date', 'fansee-blog' ),
	                'default' => true,
	                'type'    => 'toggle',
	            ),
	            array(
	                'id'      => 'post-author',
	                'label'   =>  esc_html__( 'Show Author', 'fansee-blog' ),
	                'default' => true,
	                'type'    => 'toggle',
	            )
	     	);
		}

		public function header_options(){	
			return array(
				array(
					'id'      => 'hide-in-archive-page',
					'label'   => esc_html__( 'Hide in Archive pages.', 'fansee-blog' ),
					'default' => true,
					'type'    => 'toggle'
				),
				array(
					'id'      	  => 'banner-title',
					'label'   	  => esc_html__( 'Title' , 'fansee-blog' ),
					'default' 	  => esc_html__( 'Blog' , 'fansee-blog' ),
					'type'	  	  => 'text'
				),
			    array(
			        'id'      => 'banner-title-color',
			        'label'   => esc_html__( 'Text Color' , 'fansee-blog' ),
			        'type'    => 'color',
			        'default' => '#ffffff'
			    ),
			    array(
			        'id'      => 'banner-bg-color',
			        'label'   => esc_html__( 'Background Color' , 'fansee-blog' ),
			        'type'    => 'color',
			        'default' => '#000000'
			    ),
			    array(
			    	'id' 	   => 'banner-bg-overlay',
			    	'label'    => esc_html__( 'Background Overlay', 'fansee-blog' ),
			    	'default'  => 7,
			    	'type' 	   => 'number',
			    	'input_attrs' => array(
		                'min'   => 0,
		                'max'   => 10,
		                'step'  => 1,
		            ),
			    ),
				array(
				    'id'      	=> 'banner-height',
				    'label'   	=> esc_html__( 'Height (px)', 'fansee-blog' ),
				    'type'    	=> 'slider',
		            'description' => esc_html__( 'The value is in px. Defaults to 420px.' , 'fansee-blog' ),
		            'default' => array(
		        		'desktop' => 220,
		        		'tablet'  => 220,
		        		'mobile'  => 220,
		        	),
		    		'input_attrs' =>  array(
		                'min'   => 1,
		                'max'   => 1000,
		                'step'  => 1,
		            ),
				),
			);
		}

		public 	function footer_options(){
			return array(
				array(
					'id'      => 'footer-social-menu',
					'label'   => esc_html__( 'Show Social Menu', 'fansee-blog' ),
					'description' => esc_html__( 'Please add Social menus for enabling Social menus. Go to Menus for setting up', 'fansee-blog' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'      => 'footer-copyright-text',
					'label'   => esc_html__( 'Copyright Text', 'fansee-blog' ),
					'default' => esc_html__( 'Copyright &copy; All right reserved', 'fansee-blog' ),
					'type'    => 'textarea'
				)
			);
		}

		public 	function advanced_options(){
			return array(
				array(
					'id'	  => 'pre-loader',
					'label'   => esc_html__( 'Show Preloader', 'fansee-blog' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'	  => 'enable-search',
					'label'   => esc_html__( 'Enable Search', 'fansee-blog' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'	  => 'enable-scroll-to-top',
					'label'   => esc_html__( 'Enable Scroll To Top', 'fansee-blog' ),
					'default' => true,
					'type'    => 'toggle',
				)
			);
		}

	}
}
