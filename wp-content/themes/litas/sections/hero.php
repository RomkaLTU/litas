<?php $hero = get_field('hero'); ?>
<div class="section section-hero" id="hero">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title"><?php echo $hero['title'] ?></h2>
                    <div class="section-subtitle"><?php echo $hero['subtitle'] ?></div>
                </div>
                <div class="col-md-6">
                    <?php if (!empty($hero['image'])): ?>
                        <img src="<?php echo wp_get_attachment_image_url($hero['image'], 'large') ?>" alt="image">
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
