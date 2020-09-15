<?php
/*
Template Name: Contact
*/

get_header();
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="section-title section-title-max-w"><?php the_title(); ?></h1>
                    <div class="row section-contacts">
                        <div class="col-md-6 section-contacts-left">
                            <div>Taikos pr. 21B, LT-50210 Kaunas</div>
                            <div>+370 37 330 779 <span class="separator"></span> +370 685 62121</div>
                            <div><a href="mailto:labas@unijalitas.lt">labas@unijalitas.lt</a></div>
                        </div>
                        <div class="col-md-6 section-contacts-right">
                            <div class="section-contacts-right-title">Kredito unija LITAS</div>
                            <div>Įmonės kodas: 302448934</div>
                            <div>Atsiskaitomoji sąskaita: LT00 0000 0000 0000</div>
                            <div>Banko kodas: AA0000</div>
                        </div>
                    </div>
                    <div class="section-working-hours">
                        <div class="working-hours-left">
                            <h4 class="working-hours-title">Darbo laikas</h4>
                            <div class="working-hours-h">
                                <div class="working-hours-row">
                                    <div>I-IV</div>
                                    <div>8:30 – 17:30</div>
                                </div>
                                <div class="working-hours-row">
                                    <div>V</div>
                                    <div>8:30 – 16:30</div>
                                </div>
                                <div class="working-hours-row">
                                    <div>VI-VII</div>
                                    <div>Nedirbame</div>
                                </div>
                            </div>
                        </div>
                        <div class="working-hours-right">
                            <img class="working-hours-image" src="<?php echo get_stylesheet_directory_uri()?>/images/office.jpg" alt="">
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div>
                <?php echo do_shortcode('[wpgmza id="1"]') ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();