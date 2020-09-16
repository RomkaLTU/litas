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
                    ?>
                    <div class="footer-section-dark-right">
                        <h4 class="footer-address-line">Taikos pr. 21B, LT-50210 Kaunas</h4>
                        <h4 class="footer-address-line">+370 37 330 779 <span class="separator"></span> labas@unijalitas.lt</h4>
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
                        <div class="ml-4">Jungtinės centrinės kredito unijos <u>Kreda</u> steigėja ir narė</div>
                    </div>
                    <div class="col-sm-4 d-flex flex-column align-items-lg-end">
                        <div class="social-links mb-8 mb-sm-0 mt-3 mt-md-0 text-center text-md-right">
                            <a rel="nofollow" target="_blank" href="" class="social-link">
                                <img src="<?php echo get_theme_file_uri('/images/social/facebook.svg'); ?>" alt="">
                            </a>
                            <a rel="nofollow" target="_blank" href="" class="social-link">
                                <img src="<?php echo get_theme_file_uri('/images/social/linkedin.svg'); ?>" alt="">
                            </a>
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
