<?php
get_header();

$post_id = get_queried_object_id();
$wp_terms = get_the_terms($post_id, 'faq-category');
$first_term = (isset($wp_terms[0]) ? $wp_terms[0] : false);
$first_term_id = ($first_term ? $first_term->term_id : false);

$the_query = new WP_Query([
    'post_type' => 'faq',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'faq-category',
            'field' => 'id',
            'terms' => $first_term_id,
        ]
    ]
]);
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h2 class="section-title">Dažniausiai užduodami klausimai</h2>
                <div class="row single-faq-sidebar">
                    <div class="col-md-4">
                        <ul class="single-faq-sidebar-categories">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <li class="<?php echo get_the_ID() == $post_id ? 'current' : '' ?>">
                                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="breadc">
                            <a href="<?php echo get_permalink(Helper::get_page_id_by_template('templates/duk.php')) ?>" class="text-decoration-none">D.U.K.</a>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.79293 6.00004L4.14648 3.35359L4.85359 2.64648L8.20714 6.00004L4.85359 9.35359L4.14648 8.64648L6.79293 6.00004Z" fill="#4A4A4A"/>
                            </svg>
                            <?php if ($first_term): ?>
                                <span>
                                    <?php echo $first_term->name ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h1 class="single-faq-title"><?php the_title() ?></h1>
                        <div class="wp-wysiwyg">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
