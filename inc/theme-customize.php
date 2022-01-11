<?php

function calvin_theme_customize(WP_Customize_Manager $customizer) {

    // Panel
    $customizer->add_panel('clavin_panel', [
        'title' => __('Calvin Theme Options', 'calvin'),
        'description' => __('Manage theme options', 'calvin'),
        'priority' => 1,
    ]);

    // Section
    $customizer->add_section('calvin_slider_section', [
        'title' => __('Slider Settings', 'calvin'),
        'priority' => 1,
        'panel' => 'clavin_panel',
    ]);
    $customizer->add_section('calvin_footer_section', [
        'title' => __('Footer Settings', 'calvin'),
        'priority' => 1,
        'panel' => 'clavin_panel',
    ]);
    
    // Control -> Setting
    $customizer->add_setting('page_layout');
    $customizer->add_control('page_layout', [
        'type' => 'select',
        'label' => __('Page Layout', 'calvin'),
        'section' => 'calvin_slider_section',
        'choices' => [
            'boxed' => __('Boxed', 'calvin'),
            'full-width' => __('Full width', 'calvin'),
            'stretched' => __('Stretched', 'calvin'),
        ],
        'active_callback' => function() {
            return is_front_page();
        }
    ]);

    $customizer->add_setting('slider_posts_category');
    $customizer->add_control('slider_posts_category', [
        'type' => 'select',
        'label' => __('Slider Category', 'calvin'),
        'section' => 'calvin_slider_section',
        'choices' => calvin_categories_array(),
        'active_callback' => function() {
            return is_front_page();
        }
    ]);

    $customizer->add_setting('slider_posts_count');
    $customizer->add_control('slider_posts_count', [
        'type' => 'number', // text|number|radio|checkbox|date|time|textarea|file
        'label' => __('Slides Number', 'calvin'),
        'section' => 'calvin_slider_section',
        'active_callback' => function() {
            return is_front_page();
        }
    ]);

    $customizer->add_setting('copyright_text');
    $customizer->add_control('copyright_text', [
        'type' => 'text', // text|number|radio|checkbox|date|time|textarea|file
        'label' => __('Copyright Text', 'calvin'),
        'description' => __('The copyright string in the footer.', 'calvin'),
        'section' => 'calvin_footer_section',
        'priority' => 80,
    ]);

    $customizer->add_setting('show_back_to_top', [
        'type' => 'theme_mod', // 'option'
    ]);
    $customizer->add_control('show_back_to_top', [
        'type' => 'checkbox',
        'label' => __('Show "back to top" icon', 'calvin'),
        'section' => 'calvin_footer_section',
        'value' => 1,
    ]);

    $customizer->add_setting('footer_image');
    $customizer->add_control(
        new WP_Customize_Media_Control($customizer, 'footer_image', [
            'label' => __('Footer Image', 'calvin'),
            'section' => 'calvin_footer_section',
            'priority' => 1,
        ])
    );

    $customizer->add_setting('footer_color');
    $customizer->add_control(
        new WP_Customize_Color_Control($customizer, 'footer_color', [
            'label' => __('Footer Color', 'calvin'),
            'section' => 'calvin_footer_section',
            'priority' => 1,
        ])
    );


    $customizer->selective_refresh->add_partial('copyright_text', [
        'selector' => '.ss-copyright span:nth-child(2)',
    ]);

    $customizer->selective_refresh->add_partial('footer_image', [
        'selector' => '#footer-image',
    ]);

    $customizer->selective_refresh->add_partial('slider_posts_count', [
        'selector' => '#hero .slick-dots',
    ]);

}
add_action('customize_register', 'calvin_theme_customize');

function calvin_categories_array() {
    $array = [];
    foreach (get_categories() as $cat) {
        $array[$cat->cat_ID] = $cat->cat_name;
    }
    return $array;
}
