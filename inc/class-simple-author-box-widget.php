<?php

class Simple_Author_Box_Widget_LITE extends WP_Widget {

    var $defaults;

    function __construct() {
        $widget_ops  = array('classname' => 'simple_author_box_widget_lite', 'description' => __('Use this widget to display Simple Author Box', 'saboxplugin'));
        $control_ops = array('id_base' => 'simple_author_box_widget_lite');
        parent::__construct('simple_author_box_widget_lite', __('Simple Author Box LITE', 'saboxplugin'), $widget_ops, $control_ops);

        $defaults = array(
            'title'  => __('About Author', 'saboxplugin'),
            'author' => 'auto',
        );

        $this->defaults = $defaults;

    }


    function widget($args, $instance) {
        global $post;

        extract($args);
        $instance        = wp_parse_args((array)$instance, $this->defaults);
        $sabox_author_id = $post->post_author;
        echo '<p>' . $instance['title'] . '</p>';
        $sabox_options = Simple_Author_Box_Helper::get_option('saboxplugin_options');
        include SIMPLE_AUTHOR_BOX_PATH . 'template/template-sab.php';

    }

    function update($new_instance, $old_instance) {
        $instance                = $old_instance;
        $instance['title']       = strip_tags($new_instance['title']);
        $instance['author']      = absint($new_instance['author']);

        return $instance;
    }

    function form($instance) {

        $instance = wp_parse_args((array)$instance, $this->defaults); ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title', 'saboxplugin'); ?>:</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" type="text"
                   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr__($instance['title']); ?>"
                   class="widefat"/>
        </p>
        <p>
            <?php $authors = get_users(); ?>
            <label for="<?php echo $this->get_field_id('author'); ?>"><?php echo esc_html__('Choose author/user', 'saboxplugin'); ?>
                :</label>
            <select name="<?php echo $this->get_field_name('author'); ?>"
                    id="<?php echo $this->get_field_id('author'); ?>" class="widefat">
                <option value="auto" ><?php echo esc_html__('Autodetect', 'saboxplugin'); ?></option>
                <?php foreach ($authors as $author) : ?>
                    <option value="<?php echo $author->ID; ?>" <?php selected($author->ID, $instance['author']); ?>><?php echo $author->data->user_login; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php do_action('sab_widget_add_opts', $this, $instance); ?>
        <?php

    }

}

?>