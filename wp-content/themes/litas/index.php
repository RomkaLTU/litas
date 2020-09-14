 <?php get_header(); ?>

<div class="main-padding-top">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <h1 class="section-title text-center mb-8"><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
                <?php
            endwhile;
        else :
            ?>
                <h1 class="section-title mb-8">404 - puslapis nerastas</h1>
                <div>Puslapis nerastas.</div>
            <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer();