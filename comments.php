<!-- comments
        ================================================== -->
<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="column large-12">

            <h3><?= get_comments_number() ?> Comments</h3>

            <?php // wp_list_comments() ?>

            <?php
                $comments_loop = new WP_Comment_Query();
                $comments = $comments_loop->query([
                    'status' => 'approve',
                    'post_id' => get_the_ID(),
                ]);
                if ($comments) :
            ?>
            <!-- START commentlist -->
            <ol class="commentlist">
                <?php
                foreach ($comments as $comment) :
                ?> 
                <li class="depth-1 comment">

                    <div class="comment__avatar">
                        <?= get_avatar($comment->comment_author_email, 50) ?>
                    </div>

                    <div class="comment__content">

                        <div class="comment__info">
                            <div class="comment__author"><?= $comment->comment_author ?></div>

                            <div class="comment__meta">
                                <div class="comment__time"><?= $comment->comment_date ?></div>
                                <div class="comment__reply">
                                    <a class="comment-reply-link" href="#0">Reply</a>
                                </div>
                            </div>
                        </div>

                        <div class="comment__text">
                            <?= $comment->comment_content ?>
                        </div>

                    </div>

                </li> <!-- end comment level 1 -->
                <?php
                endforeach;
                ?>
            </ol>
            <!-- END commentlist -->
            <?php
            endif;
            ?>

        </div> <!-- end col-full -->
    </div> <!-- end comments -->


    <?php
    if (comments_open()) :
        comment_form([
            'title_reply' => 'Add Comment <span>Your email address will not be published.</span>',
            'class_container' => 'row comment-respond',
            'id_form' => 'contactForm',
            'class_submit' => 'btn btn--primary btn-wide btn--large h-full-width',
            'fields' => [
                'author' => '<div class="form-field">
                                <input name="author" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                            </div>',
                'email ' => '<div class="form-field">
                                <input name="email" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                            </div>',
                'url' => '<div class="form-field">
                                <input name="url" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                            </div>',
            ],
            'comment_field' => '<div class="message form-field">
                            <textarea name="comment" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                        </div>',
        ]);
    endif;
    ?>

    <div class="row comment-respond">

        <!-- START respond -->
        <div id="respond" class="column">

            <h3>
                Add Comment
                <span>Your email address will not be published.</span>
            </h3>

            <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                <fieldset>

                    <div class="form-field">
                        <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                    </div>

                    <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                    </div>

                    <br>
                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                </fieldset>
            </form> <!-- end form -->

        </div>
        <!-- END respond-->

    </div> <!-- end comment-respond -->

</div> <!-- end comments-wrap -->