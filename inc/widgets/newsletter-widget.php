<?php

class Newsletter_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'calvin-newsletter-widget',
            __('Calvin: Newsletter Widget', 'calvin')
        );
    }

    public function form($instance)
    {
        
        printf('<p>
            <label for="%s">%s</label>
            <input type="text" name="%s" id="%s" value="%s" class="widefat">
        </p>', 
            $this->get_field_id('title'),
            esc_html__('Title', 'calvin'),
            $this->get_field_name('title'),
            $this->get_field_id('title'),
            esc_attr($instance['title'] ?? '')
        );

        printf('<p>
            <label for="%1$s">%4$s</label>
            <input type="text" name="%2$s" id="%1$s" value="%3$s" class="widefat">
        </p>', 
            $this->get_field_id('desc'),
            $this->get_field_name('desc'),
            esc_attr($instance['desc'] ?? ''),
            esc_html__('Description', 'calvin')
        );

        printf('<p>
            <label for="%1$s">%4$s</label>
            <input type="color" name="%2$s" id="%1$s" value="%3$s" class="widefat">
        </p>', 
            $this->get_field_id('btn_bg_color'),
            $this->get_field_name('btn_bg_color'),
            esc_attr($instance['btn_bg_color'] ?? ''),
            esc_html__('Button BG Color', 'calvin')
        );

    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if ($instance['title']) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        }

        echo '<p>' . $instance['desc'] . '</p>';
        printf('
        <div class="subscribe-form">
            <form id="mc-form" class="group" novalidate="true">
                <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required=""> 
                <input type="submit" name="subscribe" value="subscribe" style="background-color: %s">
                <label for="mc-email" class="subscribe-message"></label>
            </form>
        </div>', $instance['btn_bg_color']);

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $new_instance['desc'] = strtoupper($new_instance['desc']);
        return $new_instance;
    }
}