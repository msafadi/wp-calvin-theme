<!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">

                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <?php
                        if (is_active_sidebar('calvin-footer-1')) :
                            dynamic_sidebar('calvin-footer-1');
                        else :
                    ?>
                    <div class="widget">
                        <h5>About Our Site</h5>
                        <p>
                        Lorem ipsum Ut velit dolor Ut labore id fugiat in ut 
                        fugiat nostrud qui in dolore commodo eu magna Duis 
                        cillum dolor officia esse mollit proident Excepteur 
                        exercitation nulla. Lorem ipsum In reprehenderit 
                        commodo aliqua irure.
                        </p>
                    </div>
                    <?php
                        endif;
                    ?>


                </div> <!-- end s-footer__info -->

                <div class="column large-2 medium-3 tab-6 s-footer__site-links">
                    <?php
                    if (is_active_sidebar('calvin-footer-2')) :
                        dynamic_sidebar('calvin-footer-2');
                    endif
                    ?>
                </div> <!-- end s-footer__site-links -->  

                <div class="column large-2 medium-3 tab-6 s-footer__social-links">
                    <?php
                    if (is_active_sidebar('calvin-footer-3')) :
                        dynamic_sidebar('calvin-footer-3');
                    endif
                    ?>
                </div> <!-- end s-footer__social links --> 

                <div class="column large-3 medium-6 tab-12 s-footer__subscribe">
                <?php
                    if (is_active_sidebar('calvin-footer-4')) :
                        dynamic_sidebar('calvin-footer-4');
                    else :
                    ?>
                    <h5>Sign Up for Newsletter</h5>

                    <p>Signup to get updates on articles, interviews and events.</p>

                    <div class="subscribe-form">
                
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required=""> 
                
                            <input type="submit" name="subscribe" value="subscribe" >
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>

                    </div>
                    <?php
                        endif;
                    ?>
                </div> <!-- end s-footer__subscribe -->

            </div> <!-- end row -->

        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="column">
                    <div class="ss-copyright">
                        <span><?php printf( __('© Copyright %s %s', 'calvin'), bloginfo('name'), date('Y') ) ?></span> 
                        <span><?php _e('Design by', 'calvin') ?> <a href="https://www.styleshout.com/">StyleShout</a></span>
                    </div> <!-- end ss-copyright -->
                    <div>
                        <?php _ex('Close', 'Close button', 'calvin') ?> | <?php echo _x('Close', 'Near', 'calvin') ?>
                    </div>
                </div>
            </div> 

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
                </a>
            </div> <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

   </footer> <!-- end s-footer -->

   <?php wp_footer() ?>
   
</body>

</html>