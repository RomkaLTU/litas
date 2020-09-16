<?php
/*
Template Name: Paskolos
*/

get_header();

$left = get_field('left');
$right = get_field('right');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title"><?php the_title() ?></h1>
                <div class="paskolos-row">
                    <div class="paskolos-col">
                        <a href="<?php echo $left['url'] ?>" class="paskolos-row-left">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icon1.png" alt="">
                            <h2 class="paskolos-row-title"><?php echo $left['title'] ?></h2>
                        </a>
                    </div>
                    <div class="paskolos-col">
                        <a href="<?php echo $right['url'] ?>" class="paskolos-row-right">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icon2.png" alt="">
                            <h2 class="paskolos-row-title"><?php echo $right['title'] ?></h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
