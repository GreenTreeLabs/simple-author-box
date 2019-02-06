<?php
namespace ElementorSAB\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SAB_Elementor_Widget extends Widget_Base {

    public function get_name() {
        return 'simple_author_box_elementor';
    }

    public function get_title() {
        return __( 'Simple Author Box', 'saboxplugin' );
    }

    public function get_icon() {
        return 'fa fa-user';
    }

    public function get_categories() {
        return [ 'general' ];

    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'saboxplugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => __( 'URL to embed', 'saboxplugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => __( 'https://your-link.com', 'saboxplugin' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        echo wpsabox_author_box();
    }

    protected function _content_template() {
        return wpsabox_author_box();
    }

}