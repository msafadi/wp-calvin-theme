<?php
get_header();

?>

    <!-- content
    ================================================== -->
    <section class="s-content">

        <!-- page header
        ================================================== -->
        <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title">
                        <span class="page-title__small-type">Category</span>
                        <?php single_cat_title() ?>
                    </h1>
                </div>
            </div>
        </div> <!-- end s-pageheader-->

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