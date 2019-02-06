<?php
namespace ElementorSAB;
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class SAB_Elementor_Widget_Activation {


    private static $_instance = null;

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function include_widgets_files() {
        require_once(SIMPLE_AUTHOR_BOX_PATH . 'inc/elementor/widgets/class-simple-author-box-elementor.php');
    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since  1.2.0
     * @access public
     */
    public function register_widgets() {
        $this->include_widgets_files();

        // Register Widgets
        $queried_obj = get_post_type();
        // TODO need to check for pro version and modify the if statement
        if('post' == $queried_obj){
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SAB_Elementor_Widget());
        }

    }

    public function __construct() {

        // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }
}

// Instantiate Plugin Class
SAB_Elementor_Widget_Activation::instance();
