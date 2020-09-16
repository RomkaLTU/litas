<?php
/*
Template Name: DUK
*/

get_header();

$cats = get_terms('faq-category');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title">Dažniausiai užduodami klausimai</h1>
                <div class="row duk-items">
                    <?php foreach ($cats as $cat): ?>
                        <?php
                        $the_query = new WP_Query([
                            'post_type' => 'faq',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'faq-category',
                                    'field' => 'id',
                                    'terms' => $cat->term_id,
                                ]
                            ]
                        ]);
                        ?>
                        <div class="col-md-6">
                            <div class="duk-item">
                                <h3 class="duk-items-title"><?php echo $cat->name ?></h3>
                                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="duk-items-link"><?php the_title() ?></a>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
