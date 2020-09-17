        </div>
    </div>
    <footer class="footer animate-links" id="footer">
        <section class="footer-section-dark">
            <div class="container">
                <div class="footer-section-dark-inner">
                    <?php
                    $args = array(
                        'theme_location' => 'footer',
                        'menu_class' => 'nav justify-content-center nav-footer',
                        'container' => ''
                    );
                    wp_nav_menu( $args );

                    $phone = get_field('phone', 'options');
                    $address = get_field('address', 'options');
                    $email = get_field('email', 'options');
                    $copyright = get_field('copyright', 'options');
                    ?>
                    <div class="footer-section-dark-right">
                        <h4 class="footer-address-line"><?php echo $address ?></h4>
                        <h4 class="footer-address-line">
                            <a class="text-white" href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
                            <span class="separator"></span>
                            <a class="text-white" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                        </h4>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 d-flex align-items-center">
                        <div class="logo mr-8">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" class="img-fluid" alt="">
                        </div>
                        <div class="ml-4"><?php echo $copyright ?></div>
                    </div>
                    <div class="col-sm-4 d-flex flex-column align-items-lg-end">
                        <div class="social-links mb-8 mb-sm-0 mt-3 mt-md-0 text-center text-md-right">
                            <?php if ($fb = get_field('facebook', 'options')): ?>
                                <a rel="nofollow" target="_blank" href="<?php echo $fb ?>" class="social-link">
                                    <img src="<?php echo get_theme_file_uri('/images/social/facebook.svg'); ?>" alt="">
                                </a>
                            <?php endif; ?>
                            <?php if ($linked = get_field('linkedin', 'options')): ?>
                                <a rel="nofollow" target="_blank" href="<?php echo $linked ?>" class="social-link">
                                    <img src="<?php echo get_theme_file_uri('/images/social/linkedin.svg'); ?>" alt="">
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
<?php
wp_footer();
the_field( 'scripts_bottom', 'options' );
?>
        </body>
</html>
