<?php get_header(); ?>

<div class="main-padding-top">
    <div class="section section-news" id="news">
        <div class="section-padding">
            <div class="container">
                <h1 class="section-title text-center">Naujienos</h1>
            </div>
            <div class="bg-lightest news-wrapper">
                <div class="container">
                    <div class="row">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php
                        endwhile;
                        ?>
                    </div>

                    <?php
                    $args = array(
                        'type' => 'list',
                        'next_text' => 'Kitas >',
                        'prev_text' => '< Buvęs',
                    );
                    $html = paginate_links( $args );
                    if ( ! empty( $html ) ) :
                        ?>
                        <nav class="mt-5"><?php echo $html; ?></nav>
                        <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();