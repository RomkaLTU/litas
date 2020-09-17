<?php
$fast_decisions = get_field('fast_decisions');
?>

<div class="section section-fast-decisions" id="decisions">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="section-title"><?php echo $fast_decisions['title'] ?></h2>
                <div class="section-subtitle"><?php echo $fast_decisions['subtitle'] ?></div>
            </div>
            <div class="col-md-6 text-center">
                <?php if (!empty($fast_decisions['image'])): ?>
                    <img src="<?php echo wp_get_attachment_image_url($fast_decisions['image'], 'large') ?>" alt="image">
                <?php endif ?>
            </div>
        </div>
    </div>
</div>