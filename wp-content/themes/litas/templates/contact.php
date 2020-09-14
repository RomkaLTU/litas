<?php
/*
Template Name: Contact
Template Post Type: page
*/

get_header();
?>

<div class="main-padding-top">
    <div class="section-contact">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <div class="container">
                    <h1 class="section-title text-center mb-7"><?php the_title(); ?></h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="section-subtitle lead lh-xl text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                        </div>
                    </div>
                </div>
                <div class="embed-responsive embed-responsive-12by5 pt-special-mobile bg-light">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2293.504933506549!2d23.941476851999766!3d54.911611063920695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e7188e4219debb%3A0x3a5b5263186bb0e3!2sTaikos%20pr.%2021B%2C%20Kaunas%2050210!5e0!3m2!1slt!2slt!4v1599740747390!5m2!1slt!2slt" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php get_footer();