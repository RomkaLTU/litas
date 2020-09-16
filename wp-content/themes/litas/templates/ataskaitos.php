<?php
/*
Template Name: Ataskaitos
*/

get_header();

$reports = get_field('reports');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title"><?php the_title() ?></h1>
                <?php if(!empty($reports)): ?>
                    <div class="reports">
                        <?php foreach($reports as $report): ?>
                            <a href="<?php echo $report['file'] ?>" target="_blank" class="report-row">
                                <div class="report-row-left">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 2C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2H6ZM6 4H13V9H18V20H6V4ZM8 12V14H16V12H8ZM8 16V18H13V16H8Z" fill="#5630AB"/>
                                    </svg>
                                </div>
                                <div class="report-row-right"><?php echo $report['title'] ?></div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
