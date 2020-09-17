<?php $hero = get_field('hero'); ?>
<div class="section section-hero" id="hero">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title"><?php echo $hero['title'] ?></h2>
                    <div class="section-subtitle"><?php echo $hero['subtitle'] ?></div>
                    <div class="input-group">
                        <button type="submit" class="input-group-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 11V13H16L10.5 18.5L11.92 19.92L19.84 12L11.92 4.07999L10.5 5.49999L16 11H4Z" fill="#302699"/></svg></button>
                        <div class="input-field-wrap">
                            <input type="email" name="email" placeholder="El. paštas">
                        </div>
                    </div>
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
