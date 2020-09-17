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
    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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

                $phone = get_field('phone', 'options');
                $address = get_field('address', 'options');
                ?>
            </div>
            <div class="d-none d-lg-flex flex-column justify-content-end text-right">
                <strong><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></strong>
                <div><?php echo $address ?></div>
            </div>
        </div>
    </nav>

    <div class="main-content-wrapper flex-fill position-relative">
        <div class="main-content animate-links">