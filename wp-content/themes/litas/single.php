<?php

get_header();

$posts = get_posts([
    'numberposts' => 4,
    'post__not_in' => [get_queried_object_id()]
]);
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h2 class="section-title"><?php the_title() ?></h2>
                <div class="single-post-date"><?php echo get_the_date() ?></div>
                <div class="wp-wysiwyg">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="related-news">
                <div class="container">
                    <ul class="news-items">
                        <?php foreach ($posts as $post): ?>
                            <li>
                                <a href="<?php echo get_permalink($post->ID); ?>" class="news-item">
                                    <div class="news-item-title"><?php echo get_the_title($post->ID); ?></div>
                                    <div class="news-item-date"><?php echo get_the_date('Y-m-d', $post->ID) ?></div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
