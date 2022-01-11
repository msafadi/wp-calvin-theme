<!DOCTYPE html>
<html class="no-js" lang="<?php echo get_locale() ?>" dir="<?= is_rtl()? 'rtl' : 'ltr' ?>">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head() ?>

    <!-- favicons
    ================================================== -->
    <link rel="manifest" href="<?= get_theme_file_uri('site.webmanifest') ?>">

</head>

<body id="top" <?php body_class('calvin-main ' . get_theme_mod('page_layout')) ?>>

    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="s-header__logo">
            <?php the_custom_logo() ?>
        </div>

        <div class="row s-header__navigation">

            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'menu_class' => 's-header__nav',
                    'container' => 'nav',
                    'container_class' => 's-header__nav-wrap',
                    'depth' => 3,
                ]);
            ?>

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span><?php esc_html_e('Menu', 'calvin') ?></span></a>

        <div class="s-header__search">

            <div class="s-header__search-inner">
                <div class="row wide">

                    <form role="search" method="get" class="s-header__search-form" action="#">
                        <label>
                            <span class="h-screen-reader-text"><?php echo __('Search for:', 'calvin') ?></span>
                            <input type="search" class="s-header__search-field" placeholder="<?php esc_attr_e('Search for...', 'calvin') ?>" value="" name="s" title="<?php esc_attr_e('Search for:', 'calvin') ?>" autocomplete="off">
                        </label>
                        <input type="submit" class="s-header__search-submit" value="<?php esc_attr_e('Search', 'calvin') ?>"> 
                    </form>

                    <a href="#0" title="<?php esc_attr_e('Close Search', 'calvin') ?>" class="s-header__overlay-close"><?php esc_html_e('Close', 'calvin') ?></a>

                </div> <!-- end row -->
            </div> <!-- s-header__search-inner -->

        </div> <!-- end s-header__search wrap -->	

        <a class="s-header__search-trigger" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
        </a>

    </header> <!-- end s-header -->