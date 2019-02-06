<?php

namespace ElementorSAB\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SAB_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'simple_author_box_elementor';
    }

    public function get_title() {
        return __('Simple Author Box', 'saboxplugin');
    }

    public function get_icon() {
        return 'fa fa-user';
    }

    public function get_categories() {
        return ['general'];

    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'saboxplugin'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sab_author',
            [
                'label'   => __('Select author', 'saboxplugin'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => $this->sab_get_authors(),
                'default' => 'auto',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $author = $settings['sab_author'];
        echo do_shortcode('[simple-author-box ids="'.$author.'"]');
    }

    protected function _content_template() {
        return wpsabox_author_box();
    }

    public function sab_get_authors(){
        $authors = get_users();
        $author_array = array('auto' => 'Autoselect');
         foreach ($authors as $author){
             $author_array[$author->ID] = $author->data->user_login;
         }
         return $author_array;
    }

}