<?php

// If this file is called directly, busted!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*----------------------------------------------------------------------------------------------------------
	Adding the author box to the end of your single post
-----------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wpsabox_author_box' ) ) {


	function wpsabox_author_box( $saboxmeta = null ) {

		$show = ( is_single() || is_author() || is_archive() );
		$show = apply_filters( 'sabox_check_if_show', $show );

		if ( $show ) {

			global $post;
			$template = Simple_Author_Box_Helper::get_template();

			ob_start();
			$sabox_options        = Simple_Author_Box_Helper::get_option( 'saboxplugin_options' );
			$sabox_author_id      = $post->post_author;
			$show_post_author_box = apply_filters( 'sabox_check_if_show_post_author_box', true, $sabox_options );

			do_action( 'sabox_before_author_box', $sabox_options );

			if ( $show_post_author_box ) {
				include( $template );
			}

			do_action( 'sabox_after_author_box', $sabox_options );

			$sabox  = ob_get_clean();
			$return = $saboxmeta . $sabox;

			// Filter returning HTML of the Author Box
			$saboxmeta = apply_filters( 'sabox_return_html', $return, $sabox, $saboxmeta );

		}
		return $saboxmeta;
	}
}
