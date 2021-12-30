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
