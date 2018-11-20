<?php
if ( class_exists( 'ET_builder_Module' ) ) {
	class SAB_Divi_Element extends ET_Builder_Module {
		public
			$slug = 'simple_author_box';
		public
			$vb_support = 'on';

		public
		function init() {
			$this->name = esc_html__( 'Simple Author Box', 'saboxplugin' );
		}

		public
		function get_fields() {
			return array(
				'heading' => array(
					'label'           => esc_html__( 'Heading', 'saboxplugin' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Input your desired heading here.', 'saboxplugin' ),
					'toggle_slug'     => 'main_content',
				),
				'content' => array(
					'label'           => esc_html__( 'Content', 'saboxplugin' ),
					'type'            => 'tiny_mce',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Content entered here will appear below the heading text.', 'saboxplugin' ),
					'toggle_slug'     => 'main_content',
				),
			);
		}

		public
		function render(
			$unprocessed_props, $content = null, $render_slug
		) {
			return wpsabox_author_box();
		}
	}

	new SAB_Divi_Element;
}