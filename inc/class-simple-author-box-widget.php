<?php
class Simple_Author_Box_Widget_LITE extends WP_Widget {

    var $defaults;

    function __construct() {
        $widget_ops  = array('classname' => 'simple_author_box_widget_lite', 'description' => __('Use this widget to display Simple Author Box', 'saboxplugin'));
        $control_ops = array('id_base' => 'simple_author_box_widget_lite');
        parent::__construct('simple_author_box_widget_lite', __('Simple Author Box LITE', 'saboxplugin'), $widget_ops, $control_ops);

    }


    function widget($args, $instance) {

        extract($args);
        $instance = wp_parse_args((array)$instance, $this->defaults);
        echo '<p>'.$instance['title'].'</p>';
        include SIMPLE_AUTHOR_BOX_PATH . 'template/template-sab.php';

    }

    function update($new_instance, $old_instance) {
        $instance          = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    function form($instance) {

        $instance = wp_parse_args((array)$instance, $this->defaults); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'saboxplugin'); ?>:</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>
        <?php do_action('sab_widget_add_opts', $this, $instance); ?>
        <?php

    }

}

?>