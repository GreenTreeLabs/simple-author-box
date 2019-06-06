<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Simple_Author_Box_User_Importer {

	function __construct() {
		add_action( 'wp_ajax_sab_import_users', array( $this, 'trigger_import_users' ) );
		add_action( 'sabox_field_ajax_button_output', array( $this, 'ajax_button_field' ), 10, 3 );
	}


	public function trigger_import_users() {

		if ( isset( $_POST['action'] ) && 'sab_import_users' == $_POST['action'] ) {
			if ( isset( $_POST['post_type'] ) && '' != $_POST['post_type'] ) {
				$post_type = $_POST['post_type'];
				$this->import_cap_users( $post_type );
			}
		}

	}

	public function import_cap_users( $post_type ) {

		$cap_args = array(
			'post_type'      => $post_type,
			'posts_per_page' => - 1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC'
		);

		$cap_users = new WP_Query( $cap_args );

		if ( $cap_users->have_posts() ) {
			while ( $cap_users->have_posts() ) {
				$cap_users->the_post();
				$id                   = get_the_id();
				$user                 = array();
				$user['user_name']    = get_post_meta( $id, 'cap-user_login', true );
				$user['first_name']   = get_post_meta( $id, 'cap-first_name', true );
				$user['last_name']    = get_post_meta( $id, 'cap-last_name', true );
				$user['display_name'] = get_post_meta( $id, 'cap-display_name', true );
				$user['user_email']   = get_post_meta( $id, 'cap-user_email', true );
				$user['user_login']   = get_post_meta( $id, 'cap-user_login', true );
				$user['user_url']     = get_post_meta( $id, 'cap-website', true );
				$user['description']  = get_post_meta( $id, 'cap-description', true );
				$user['role']         = 'author';
				$user['aim']          = get_post_meta( $id, 'cap-aim', true );
				$user['jabber']       = get_post_meta( $id, 'cap-jabber', true );
				$user['yim']          = get_post_meta( $id, 'cap-yahooim', true );

				$user_id = username_exists( $user['user_name'] );
				if ( ! $user_id and email_exists( $user['user_email'] ) == false ) {
					$user['user_pass'] = wp_generate_password( $length = 12, $include_standard_special_chars = false );
					$user_id           = wp_insert_user( $user );
				}
			}
			echo __( 'Users have been imported', 'saboxplugin' );
			wp_die();
		} else {
			echo __( 'No Co-Author users have been found', 'saboxplugin' );
			wp_die();
		}


	}

	// Add new setting type
	public function ajax_button_field( $field_name, $field ) {
		$html = '<a href="#" class="sab-ajax-button button button-primary button-hero" data-post_type="' . $field['post_type'] . '" id="' . $field_name . '" data-action="' . $field['action'] . '" style="float:right;">' . esc_html__( 'Import', 'saboxpro' ) . '</a>';
		echo $html;
	}

}

new Simple_Author_Box_User_Importer();