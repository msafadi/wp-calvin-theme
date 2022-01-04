<?php
get_header()
?>

<!-- content
    ================================================== -->
    <section <?php post_class('s-content') ?>>

<div class="row">
    <div class="column large-12">
        <div class="s-content__entry-header">
            <h1 class="s-content__title s-content__title--post"><?php _e('Page Not Found', 'calvin') ?></h1>
        </div> <!-- end s-content__entry-header -->

        <div class="s-content__primary">

            <div class="s-content__entry-content">
                <?php _e('Sorry, the page you are looking for is not exists.', 'calvin') ?>
            </div> <!-- end s-entry__entry-content -->

        </div> <!-- end s-content__primary -->
    
    </div> <!-- end column -->
</div> <!-- end row -->

</section> <!-- end s-content -->


<?php
get_footer();
?>