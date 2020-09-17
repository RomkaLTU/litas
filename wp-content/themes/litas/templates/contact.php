<?php
/*
Template Name: Contact
*/

get_header();

$contacts = get_field('contacts');
$working_hours = get_field('working_hours');
$map = get_field('map');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="section-title section-title-max-w"><?php echo (!empty($contacts['title'])) ? $contacts['title'] : get_the_title(); ?></h1>
                    <div class="row section-contacts">
                        <div class="col-md-6 section-contacts-left">
                            <?php echo $contacts['left'] ?>
                        </div>
                        <div class="col-md-6 section-contacts-right">
                            <?php echo $contacts['right'] ?>
                        </div>
                    </div>
                    <div class="section-working-hours">
                        <div class="working-hours-left">
                            <h4 class="working-hours-title"><?php echo $working_hours['title'] ?></h4>
                            <div class="working-hours-h">
                                <?php foreach($working_hours['days'] as $row): ?>
                                    <div class="working-hours-row">
                                        <div><?php echo $row['left'] ?></div>
                                        <div><?php echo $row['right'] ?></div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="working-hours-right">
                            <img class="working-hours-image" src="<?php echo wp_get_attachment_image_url($working_hours['image'], 'large') ?>" alt="image">
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="embed-responsive embed-responsive-21by9 pt-special-mobile bg-light">
                <?php echo $map ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();