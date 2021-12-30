<article class="brick entry" data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php the_permalink() ?>" class="thumb-link">
            <?php the_post_thumbnail() ?>
        </a>
    </div> <!-- end entry__thumb -->

    <div class="entry__text">
        <div class="entry__header">
            <h1 class="entry__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

            <div class="entry__meta">
                <span class="cat-links" style="padding: 3px; background-color: #000; color: #fff;">
                    <?php echo get_post_format() ?>
                </span>
                <span class="byline">By:
                    <span class="author">
                        <?php the_author() ?>
                    </span>
                </span>
                <span class="cat-links">
                    <?php the_category(', ') ?>
                </span>
            </div>
        </div>
        <a class="entry__more-link" href="<?php the_permalink() ?>">Learn More</a>
    </div> <!-- end entry__text -->

</article> <!-- end article -->