<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Simple_Author_Box_Pro_User_Importer {

	function __construct() {
		add_action( 'wp_ajax_sab_import_users', 'trigger_import_users' );
		add_action( 'sabox_field_ajax_button_output', array( $this, 'ajax_button_field' ), 10, 3 );
	}


	public function trigger_import_users() {
		var_dump('test');
		die();
		if ( isset( $_POST['action'] ) && 'sab_import_users' == $_POST['action'] ) {
			if ( isset( $_POST['post_type'] ) && '' != $_POST['post_type'] ) {
				$post_type = $_POST['post_type'];
				$this->import_cap_users( $post_type );
			}
		}

	}

	public function import_cap_users( $post_type ) {

		$cap_args  = array(
			'post_type'      => 'gues-authors',
			'posts_per_page' => - 1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC'
		);
		$cap_users = new WP_Query( $cap_args );
		if ( $cap_users->have_posts() ) {
			while ( $cap_users->have_posts() ) {
				$cap_users->the_post();
				$id                        = get_the_id();
				$user                      = array();
				$user['user_name']         = get_the_title();
				$user['user_first_name']   = get_post_meta( $id, 'cap-first_name', true );
				$user['user_last_name']    = get_post_meta( $id, 'cap-last_name', true );
				$user['user_display_name'] = get_post_meta( $id, 'cap-display_name', true );
				$user['user_email']        = get_post_meta( $id, 'cap_user_email', true );
				$user['user_login']        = get_post_meta( $id, 'cap-user_login', true );
				$user['user_website']      = get_post_meta( $id, 'cap-website', true );
				$user['user_description']  = get_post_meta( $id, 'cap-description', true );

				$user_id = username_exists( $user['user_name'] );
				if ( ! $user_id and email_exists( $user['user_email'] ) == false ) {
					$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
					$user_id         = wp_create_user( $user['user_name'], $random_password, $user['user_email'] );
				} else {
					$random_password = __( 'User already exists.  Password inherited.', 'saboxpro' );
				}

				$metas = array(
					'description' => $user['user_description'],
					'first_name'  => $user['user_first_name'],
					'last_name'   => $user['user_last_name'],
				);
				$this->update_user_info( $user_id, 'description', $user['user_description'] );
			}
		}

		echo __( 'Users Imported', 'saboxpro' );
		wp_die();
	}

	// Add new setting type
	public function ajax_button_field( $field_name, $field ) {
		$html = '<a href="#" class="sab-ajax-button button button-primary button-hero" data-post_type="' . $field['post_type'] . '" id="' . $field_name . '" data-action="' . $field['action'] . '" style="float:right;">' . esc_html__( 'Import', 'saboxpro' ) . '</a>';
		echo $html;
	}

	public function update_user_info( $user_id, $metas ) {
		foreach ( $metas as $meta_key => $meta_value ) {
			update_user_meta( $user_id, $meta_key, $meta_value );
		}

	}

}

new Simple_Author_Box_Pro_User_Importer();