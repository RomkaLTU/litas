<?php
$logo_separator = get_field('logo_separator');
$images = $logo_separator['images'];
?>

<div class="section section-logo-separator" id="logo-separator">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center align-items-center">
                <?php if ($images): ?>
                    <?php foreach ($images as $image): ?>
                        <img src="<?php echo wp_get_attachment_image_url($image, 'large') ?>" alt="">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
