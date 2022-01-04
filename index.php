<?php
get_header();

$slider_loop = new WP_Query([
    'posts_per_page' => 3,
    'post__in' => get_option('sticky_posts'),
]);

?>


    <?php
    if ($slider_loop->have_posts()) :
    ?>
    <!-- hero
    ================================================== -->
    <section id="hero" class="s-hero" dir="ltr">

        <div class="s-hero__slider">
            <?php
            while ($slider_loop->have_posts()) :
                $slider_loop->the_post();
            ?>
            <div class="s-hero__slide" dir="<?= is_rtl()? 'rtl' : 'ltr' ?>">

                <div class="s-hero__slide-bg" style="background-image: url('<?php header_image() ?>');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <?php the_category(' ') ?>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <?php the_author() ?>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title() ?>
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->
            <?php
            endwhile;
            ?>
        </div> <!-- end s-hero__slider -->

        <div class="s-hero__social hide-on-mobile-small">
            <p><?php _e('Follow', 'calvin') ?></p>
            <span></span>
            <?php
                wp_nav_menu([
                    'theme_location' => 'social-menu',
                    'container' => '',
                    'menu_class' => 's-hero__social-icons',
                    'depth' => 1
                ]);
            ?>
        </div> <!-- end s-hero__social -->

        <div class="nav-arrows s-hero__nav-arrows">
            <button class="s-hero__arrow-prev">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path></svg>
            </button>
            <button class="s-hero__arrow-next">
               <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path></svg>
            </button>
        </div> <!-- end s-hero__arrows -->

    </section> <!-- end s-hero -->
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">
        <a name="content"></a>

        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                        endwhile;
                    endif;
                    ?>
                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->

            <div class="row">
                <div class="column large-12">
                    <?php
                        $pgs = str_replace(
                            ['prev page-numbers', 'next page-numbers', 'page-numbers',], 
                            ['pgn__prev', 'pgn__next', 'pgn__num'], 
                            get_the_posts_pagination([
                                'type' => 'list',
                                'class' => 'pgn',
                            ]));
                        
                        echo str_replace("<ul class='pgn__num'>", '<ul>', $pgs);
                            
                    ?>
                </div> <!-- end column -->
            </div> <!-- end row -->

        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->


<?php
get_footer();
?>