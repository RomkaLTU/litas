<?php
$insurance = get_field('insurance');
?>

<div class="section section-insurance" id="insurance">
    <div class="container position-relative">
        <?php if (!empty($fast_decisions['image'])): ?>
            <img class="section-insurance-image" src="<?php echo wp_get_attachment_image_url($insurance['image'], 'large') ?>" alt="image">
        <?php endif ?>
        <div class="row">
            <div class="col-sm-8">
                <h2 class="section-title"><?php echo $insurance['title'] ?></h2>
                <div class="section-subtitle"><?php echo $insurance['subtitle'] ?></div>
            </div>
        </div>
    </div>
</div>