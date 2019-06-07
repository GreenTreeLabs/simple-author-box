<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Simple_Author_Box_User_Importer {

	function __construct() {

		add_filter( 'sabox_admin_settings', array( $this, 'add_new_setting' ), 10 );
		add_filter( 'sabox_admin_sections', array( $this, 'add_new_section' ), 10 );

		add_action( 'wp_ajax_sab_import_users', array( $this, 'trigger_import_users' ) );
		add_action( 'wp_ajax_hide_import_notice', array( $this, 'hide_import_notice' ) );

		add_action( 'wp_loaded', array( $this, 'check_cap_users' ) );

	}


	/**
	 * Add new user-importer section
	 *
	 * @param $sections
	 *
	 * @return mixed
	 */
	public function add_new_section( $sections ) {
		$sections['user-importer'] = array(
			'label' => __( 'Import Users', 'saboxplugin' ),
		);

		return $sections;
	}

	/**
	 * Add new import_cap_users setting
	 *
	 * @param $setting
	 *
	 * @return mixed
	 */
	public function add_new_setting( $setting ) {
		$setting['user-importer']['import_cap_users'] = array(
			'label'       => __( 'Import users from Co-Authors plugin', 'saboxplugin' ),
			'description' => __( 'Import Users created by the Co-Authors Plus plugin. Please be patient, depending on how many users you have this can take a while. Please DO NOT leave this page if you started the import.', 'saboxplugin' ),
			'type'        => 'ajax_button',
			'action'      => 'sab_import_users',
			'post_type'   => 'guest-author'
		);

		return $setting;
	}


	public function check_cap_users() {
		$sab_import = get_transient( 'sab_import' );

		// check to see if there is any info about Co-Authors Plus users
		if ( true == $this->cap_plugin_users_exist() ) {

			// Display admin notice if there is info about the Co-Authors Plus users and notice hasn't been shown before
			if ( ! $sab_import ) {
				add_action( 'admin_notices', array( $this, 'let_sab_import_users' ) );
			}
		}
	}

	/**
	 * Check to see if Co-Authors Plus plugin made users exist
	 *
	 * @return bool
	 */
	public function cap_plugin_users_exist() {
		$cap_args = array(
			'post_type' => 'guest-author',
		);

		$cap_users = new WP_Query( $cap_args );

		if ( $cap_users->found_posts > 0 ) {
			return true;
		}

		return false;
	}


	/**
	 *  Trigger import_cap_users
	 */
	public function trigger_import_users() {

		if ( isset( $_POST['action'] ) && 'sab_import_users' == $_POST['action'] ) {
			if ( isset( $_POST['post_type'] ) && '' != $_POST['post_type'] ) {
				$post_type = $_POST['post_type'];
				$this->import_cap_users( $post_type );
			}
		}

	}

	/**
	 * Import Co-Authors Plus plugin made users as WP users
	 *
	 * @param $post_type
	 */
	public function import_cap_users( $post_type ) {

		// Apparently user saw the import button so we should hide the notice
		set_transient( 'sab_import', 'true', 0 );

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
			echo __( 'No Co-Authors users have been found', 'saboxplugin' );
			wp_die();
		}

	}

	/**
	 *  Admin notice to let Simple Author Box import users
	 */
	public function let_sab_import_users() {
		?>
        <div class="notice is-dismissible" id="sab_import_notice">
            <p><?php _e( 'Seems like you have Co-Authors Plus plugin installed. Let <strong>Simple Author Box</strong> import it\'s users for you.', 'saboxplugin' ); ?>
                <a class="button button-primary"
                   href="<?php echo admin_url( 'admin.php?page=simple-author-box-options#user-importer' ) ?>"><?php _e( 'Take me to import page', 'saboxplugin' ) ?></a>
            </p>
        </div>
		<?php
	}

	public function hide_import_notice() {
		// User dismissed the notice, so we should hide it.
		if ( isset( $_POST['action'] ) && 'hide_import_notice' == $_POST['action'] ) {
			set_transient( 'sab_import', 'true', 0 );
		}
	}
}

new Simple_Author_Box_User_Importer();