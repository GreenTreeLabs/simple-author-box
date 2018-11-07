<?php
/**
 * Plugin Name: Simple Author Box
 * Plugin URI: http://wordpress.org/plugins/simple-author-box/
 * Description: Adds a responsive author box with social icons on your posts.
 * Version: 2.1.3
 * Author: Macho Themes
 * Author URI: https://www.machothemes.com/
 * License: GPLv3
 */

/*  Copyright 2018 Machothemes (email : office [at] machothemes [dot] com)

	THIS PROGRAM IS FREE SOFTWARE; YOU CAN REDISTRIBUTE IT AND/OR MODIFY
	IT UNDER THE TERMS OF THE GNU GENERAL PUBLIC LICENSE AS PUBLISHED BY
	THE FREE SOFTWARE FOUNDATION; EITHER VERSION 2 OF THE LICENSE, OR
	(AT YOUR OPTION) ANY LATER VERSION.

	THIS PROGRAM IS DISTRIBUTED IN THE HOPE THAT IT WILL BE USEFUL,
	BUT WITHOUT ANY WARRANTY; WITHOUT EVEN THE IMPLIED WARRANTY OF
	MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE.  SEE THE
	GNU GENERAL PUBLIC LICENSE FOR MORE DETAILS.

	YOU SHOULD HAVE RECEIVED A COPY OF THE GNU GENERAL PUBLIC LICENSE
	ALONG WITH THIS PROGRAM; IF NOT, WRITE TO THE FREE SOFTWARE
	FOUNDATION, INC., 51 FRANKLIN ST, FIFTH FLOOR, BOSTON, MA  02110-1301  USA

*/

define( 'SIMPLE_AUTHOR_BOX_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIMPLE_AUTHOR_BOX_ASSETS', plugins_url( '/assets/', __FILE__ ) );
define( 'SIMPLE_AUTHOR_BOX_SLUG', plugin_basename( __FILE__ ) );
define( 'SIMPLE_AUTHOR_BOX_VERSION', '2.1.3' );
define( 'SIMPLE_AUTHOR_SCRIPT_DEBUG', false );


require_once SIMPLE_AUTHOR_BOX_PATH . 'inc/class-simple-author-box.php';
Simple_Author_Box::get_instance();

// load the uninstall feedback class
require_once 'inc/feedback/class-epsilon-feedback-sab.php';
new Epsilon_Feedback_SAB( __FILE__ );
