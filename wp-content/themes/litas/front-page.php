<?php get_header(); ?>

<div class="main-padding-top">
    <?php
    include( locate_template( 'sections/hero.php' ) );
    include( locate_template( 'sections/logo-separator.php' ) );
    include( locate_template( 'sections/big-interest.php' ) );
    include( locate_template( 'sections/fast-decisions.php' ) );
    include( locate_template( 'sections/unlimited.php' ) );
    include( locate_template( 'sections/insurance.php' ) );
    ?>
</div>

<?php get_footer();
