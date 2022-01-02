<?php

// Hooks: actions or filters

function calvin_theme_setup() {

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

    register_nav_menu('main-menu', 'Top Main Menu');
    register_nav_menu('social-menu', 'Side Social Menu');

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
        'name' => 'Footer 1',
        'description' => 'Footer col 1',
        'before_widget' => '<div class="calvin-widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);
    register_sidebar([
        'id' => 'calvin-footer-2',
        'name' => 'Footer 2',
        'description' => 'Footer col 2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);

    register_sidebar([
        'id' => 'calvin-footer-3',
        'name' => 'Footer 3',
        'description' => 'Footer col 3',
        'before_widget' => '<div class="calvin-widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ]);
    register_sidebar([
        'id' => 'calvin-footer-4',
        'name' => 'Footer 4',
        'description' => 'Footer col 4',
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