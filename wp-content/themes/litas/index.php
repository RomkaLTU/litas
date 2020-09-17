<?php get_header(); ?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title">Naujienos</h1>
                <ul class="news-items">
                    <?php while (have_posts()): the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="news-item">
                                <div class="news-item-title"><?php the_title(); ?></div>
                                <div class="news-item-date"><?php echo get_the_date() ?></div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php
                $args = array(
                    'type' => 'list',
                    'next_text' => 'Kitas >',
                    'prev_text' => '< Buvęs',
                );
                $html = paginate_links( $args );
                if ( ! empty( $html ) ) :
                    ?>
                    <nav class="my-5 d-flex justify-content-center"><?php echo $html; ?></nav>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();