<?php

// Hooks: actions or filters

function calvin_theme_setup() {

    load_theme_textdomain( 'calvin', get_template_directory() . '/languages' );
    // load_theme_textdomain( 'calvin-admin', get_template_directory() . '/languages' );

    // RSS feeds links
    add_theme_support('automatic-feed-links');

    // <title>Site Title and Page Title</title>
    add_theme_support('title-tag');

    add_theme_support('html5');

    // Custom Logo
    add_theme_support('custom-logo', [
        'width'              => 300,
        'height'             => 50,
        'flex-width'         => false,
        'flex-height'        => true,
    ]);

    // Custom Header
    add_theme_support('custom-header', [
        'default-image'      => get_theme_file_uri('assets/images/slide1-bg-3000.jpg'),
        'width'              => 2000,
        'height'             => 800,
        'flex-width'         => true,
        'flex-height'        => false,
    ]);

    // Custom Background
    add_theme_support('custom-background', [

    ]);

    // Post formats
    add_theme_support('post-formats', [
        'image', 'gallery', 'video', 'audio', 'aside', 'quote',
    ]);

    // Post Thumbnails (Featured Image)
    add_theme_support('post-thumbnails');

    // Image sizes
    add_image_size('calvin-thumb', 375, 250, false);
    // Set size "post-thumbnail"
    set_post_thumbnail_size(375, 250);

    register_nav_menu('main-menu', __('Top Main Menu', 'calvin') );
    register_nav_menu('social-menu', __('Side Social Menu', 'calvin') );

}
add_action('after_setup_theme', 'calvin_theme_setup');

function calvin_enqueue_scripts() {
    // Enqueue Styles (CSS)
    wp_register_style(
        'calvin-vendor',                                // Handle (ID)
        get_theme_file_uri('assets/css/vendor.css'),    // Source (Path)
        [],                                             // Dependancy
        '1.0',                                          // Version
        'all'                                           // Media
    );
    wp_register_style(
        'calvin-vendor-rtl',                                // Handle (ID)
        get_theme_file_uri('assets/css/vendor-rtl.css'),    // Source (Path)
        [],                                             // Dependancy
        '1.0',                                          // Version
        'all'                                           // Media
    );

    if (is_rtl()) {
        wp_enqueue_style(
            'calvin-styles-rtl',
            get_theme_file_uri('assets/css/styles-rtl.css'),
            ['calvin-vendor-rtl'],
            false,
            'all'
        );
    } else {
        // wp_enqueue_style('calvin-vendor');
        wp_enqueue_style(
            'calvin-styles',
            get_theme_file_uri('assets/css/styles.css'),
            ['calvin-vendor'],
            false,
            'all'
        );
    }
    

    // Enqueue Scripts (JS)
    wp_register_script(
        'calvin-modernizr',                             // Handle (ID)
        get_theme_file_uri('assets/js/modernizr.js'),   // Source
        [],                                             // Dependancies
        false,                                          // Version
        false                                           // In footer
    );
    wp_register_script(
        'calvin-fontawesome',                             // Handle (ID)
        get_theme_file_uri('assets/js/fontawesome/all.min.js'),   // Source
        [],                                             // Dependancies
        false,                                          // Version
        false                                           // In footer
    );

    wp_enqueue_script(
        'calvin-plugins',
        get_theme_file_uri('assets/js/plugins.js'),
        ['calvin-modernizr', 'calvin-fontawesome', 'jquery'],
        false,
        true
    );

    wp_enqueue_script(
        'calvin-main',
        get_theme_file_uri('assets/js/main.js'),
        ['calvin-plugins', 'jquery'],
        false,
        true
    );

    //wp_dequeue_style('calvin-styles-rtl');
    //wp_dequeue_script('calvin-main');

}
add_action('wp_enqueue_scripts', 'calvin_enqueue_scripts');

function calvin_register_sidebars() {

    register_sidebar([
        'id' => 'calvin-footer-1',
        'name' => __('Footer 1', 'calvin'),
        'description' => __('Footer col 1', 'calvin'),
        'before_widget' => '<div class="calvin-widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);
    register_sidebar([
        'id' => 'calvin-footer-2',
        'name' => __('Footer 2', 'calvin'),
        'description' => __('Footer col 2', 'calvin'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);

    register_sidebar([
        'id' => 'calvin-footer-3',
        'name' => __('Footer 3', 'calvin'),
        'description' => __('Footer col 3', 'calvin'),
        'before_widget' => '<div class="calvin-widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);
    register_sidebar([
        'id' => 'calvin-footer-4',
        'name' => __('Footer 4', 'calvin'),
        'description' => __('Footer col 4', 'calvin'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);

    register_sidebar([
        'id' => 'calvin-right-sidebar',
        'name' => __('Right Sidebar', 'calvin'),
        'description' => __('Right Sidebar', 'calvin'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);
}
add_action('widgets_init', 'calvin_register_sidebars');

include __DIR__ . '/inc/widgets/newsletter-widget.php';

function calvin_register_widgets() {
    
    register_widget(new Newsletter_Widget);
}
add_action('widgets_init', 'calvin_register_widgets');


// WordPress Hooks
// 1. Actions: Events and Listeners
//  add_action(), remove_action(), do_action()
function calvin_before_title() {
    echo '<h2 class="s-content__title s-content__title--post">';
}
add_action('calvin_before_title', 'calvin_before_title');

function calvin_after_title() {
    echo '</h2>';
}
add_action('calvin_after_title', 'calvin_after_title');

function calvin_add_post_format_after_title($format, $type) {
    echo '<span style="color:#fff;background:#000;display:inline-block;padding:5px">' . $type . '</span>';
}
add_action('calvin_after_title', 'calvin_add_post_format_after_title', 5, 2);

remove_action('calvin_after_title', 'calvin_add_post_format_after_title', 5);

function calvin_custom_style() {
    echo '<style>body{background:#000 !important}</style>';
}
// add_action('wp_head', 'calvin_custom_style');

remove_action('wp_head', 'wp_generator');

// 2. Filters: Modification on content
//  add_filter(), remove_filter(), apply_filters()
function calvin_capitlize_title($title, $id) {
    if (get_post_type($id) == 'post') {
        return strtoupper($title);
    }
    return $title;
}
add_filter('the_title', 'calvin_capitlize_title', 10, 2);

//remove_filter('the_title', 'calvin_capitlize_title');

function calvin_add_read_more($excerpt) {
    return $excerpt . '<a href="">Read more</a>';
}
add_filter('the_excerpt', 'calvin_add_read_more');

function calvin_add_dots($excerpt) {
    return $excerpt . '...';
}
add_filter('the_excerpt', 'calvin_add_dots', 5);

function calvin_excerpt_length() {
    return 10;
}
add_filter('excerpt_length', 'calvin_excerpt_length');

function calvin_designedby($value) {
    return 'Powered By';
}
add_filter('calvin_designedby', 'calvin_designedby');

require_once __DIR__ . '/inc/theme-customize.php';