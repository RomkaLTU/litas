<?php
/*
Template Name: Apie uniją
*/

get_header();
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="container">
                    <h1 class="section-title mb-5"><?php the_title(); ?></h1>
                    <div class="wp-wysiwyg">
                        <?php the_field('the_content'); ?>
                    </div>
                </div>
                <div class="section-yellow">
                    <div class="container wp-wysiwyg">
                        <?php the_field('the_content_yellow'); ?>
                    </div>
                </div>
                <div class="section-rekvizitai">
                    <div class="container wp-wysiwyg">
                        <?php the_field('the_content_rekvizitai'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
