<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#5630AB">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800;900&display=swap" rel="stylesheet">
    <?php the_field( 'scripts_head', 'options' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'd-flex flex-column mvh-100 position-relative' ); ?>>
    <?php the_field( 'scripts_body', 'options' ); ?>
    
    <nav class="nav navbar navbar-main navbar-expand-lg navbar-light fixed-top" id="navbar-main">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <div class="collapse navbar-collapse justify-content-lg-center" id="navbar-collapse">
                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-nav-primary',
                    'container' => ''
                );
                wp_nav_menu( $args );
                ?>
            </div>
            <div class="d-none d-lg-flex flex-column justify-content-end text-right"><strong>+370 685 11111</strong><div>Kaunas, Taikos pr. 21B</div></div>
        </div>
    </nav>

    <div class="main-content-wrapper flex-fill position-relative">
        <div class="main-content animate-links">