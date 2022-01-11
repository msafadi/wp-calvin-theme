<?php
/*
Template Name: Right sidebar
Template Post Type: page,post
*/

get_header();
?>


<!-- content
    ================================================== -->
<section <?php post_class('s-content') ?>>

    <div class="row">
        <div class="column large-8">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
            <article class="s-content__entry format-standard">

                <div class="s-content__media">
                    <div class="s-content__post-thumb">
                        <?php the_post_thumbnail() ?>
                    </div>
                </div> <!-- end s-content__media -->

                <div class="s-content__entry-header">
                    <h1 class="s-content__title s-content__title--post"><?php the_title() ?></h1>
                </div> <!-- end s-content__entry-header -->

                <div class="s-content__primary">

                    <div class="s-content__entry-content">
                        <?php the_content() ?>
                    </div> <!-- end s-entry__entry-content -->

                </div> <!-- end s-content__primary -->
            </article> <!-- end entry -->
            <?php
                endwhile;
            endif;
            ?>

        </div> <!-- end column -->
        <div class="column large-4">
            <?php
            dynamic_sidebar('calvin-right-sidebar')
            ?>
        </div>
    </div> <!-- end row -->

</section> <!-- end s-content -->

<?php get_footer() ?>