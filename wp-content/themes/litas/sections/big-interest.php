<?php
$big_interest = get_field('big_interest');
?>

<div class="section section-big-interest" id="palukanos">
    <div class="section-padding">
        <div class="container position-relative">
            <img class="section-big-interest-image" src="<?php echo wp_get_attachment_image_url($big_interest['image'], 'large') ?>" alt="image">
            <div class="row">
                <div class="col-sm-6 offset-sm-6">
                    <div class="section-content">
                        <h2 class="section-title"><?php echo $big_interest['title'] ?></h2>
                        <div class="section-subtitle"><?php echo $big_interest['subtitle'] ?></div>
                        <div class="section-subtitle">
                            <a href="<?php echo $big_interest['link']['url'] ?>"><?php echo $big_interest['link']['title'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
