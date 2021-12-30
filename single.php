<?php
get_header();
?>


<!-- content
    ================================================== -->
<section <?php post_class('s-content') ?>>

    <div class="row">
        <div class="column large-12">
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

                    <div class="s-content__entry-meta">

                        <div class="entry-author meta-blk">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('email'), 155)  ?>
                            </div>
                            <div class="byline">
                                <span class="bytext">Posted By</span>
                                <?php the_author() ?>
                            </div>
                        </div>

                        <div class="meta-bottom">

                            <div class="entry-cat-links meta-blk">
                                <div class="cat-links">
                                    <span>In</span>
                                    <?php the_category(' ') ?>
                                </div>

                                <span>On</span>
                                <?= get_the_date() ?>
                            </div>

                            <div class="entry-tags meta-blk">
                                <span class="tagtext">Tags</span>
                                <?php the_tags(null, ' ') ?>
                            </div>

                        </div>

                    </div> <!-- s-content__entry-meta -->

                    <div class="s-content__pagenav">
                        <div class="prev-nav">
                            <?php previous_post_link('%link', '<span>Previous</span> %title') ?>
                        </div>
                        <div class="next-nav">
                            <?php next_post_link('%link', '<span>Next</span> %title') ?>
                        </div>
                    </div> <!-- end s-content__pagenav -->

                </div> <!-- end s-content__primary -->
            </article> <!-- end entry -->
            <?php
                endwhile;
            endif;
            ?>

        </div> <!-- end column -->
    </div> <!-- end row -->


    <?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
    ?>


</section> <!-- end s-content -->

<?php get_footer() ?>