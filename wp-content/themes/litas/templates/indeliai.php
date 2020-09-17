<?php
/*
Template Name: Indeliai
*/

get_header();

$palukanos = get_field('palukanos');
$palukanos_rows = $palukanos['rows'];
$cta = get_field('cta');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title section-title-max-w"><?php echo $palukanos['title'] ?></h1>

                <div class="table-responsive">
                    <table class="table table-custom-1">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Terminas mėnesiais</th>
                            <th scope="col">Metinės palūkanos</th>
                            <th scope="col">Senjorams</th>
                            <th scope="col">virš 80 000 eurų</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $palukanos_rows[0]['months'] ?></td>
                            <td><?php echo $palukanos_rows[0]['interest'] ?></td>
                            <td class="table-custom-1-rowspan" rowspan="6">
                                +0.1%
                            </td>
                            <td class="table-custom-1-rowspan" rowspan="6">
                                +0.1%
                            </td>
                        </tr>
                        <?php
                        unset($palukanos_rows[0]);
                        foreach ($palukanos_rows as $row): ?>
                        <tr>
                            <td><?php echo $row['months'] ?></td>
                            <td><?php echo $row['interest'] ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($palukanos['list'])): ?>
                    <ul class="centered-list">
                        <?php foreach ($palukanos['list'] as $list_item): ?>
                            <li><?php echo $list_item['text'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="section-cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="section-cta-title"><?php echo $cta['title'] ?></h2>
                            <a href="<?php echo $cta['link']['url'] ?>" class="section-cta-link"><?php echo $cta['link']['title'] ?></a>
                        </div>
                        <div class="col text-center text-lg-right">
                            <img src="<?php echo wp_get_attachment_image_url($cta['image'], 'large') ?>" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-calculator">
                <div class="container">
                    <h1 class="section-title section-title-max-w mb-5">Indėlių skaičiuoklė</h1>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-group input-group-sum">
                                <span class="input-group-sum-currency">€</span>
                                <label class="input-group-label">Indelio suma</label>
                                <div class="input-field-wrap">
                                    <input type="number" step="100">
                                </div>
                            </div>
                            <div class="input-group input-group-radio input-group-radio-terminas">
                                <div class="mb-2 input-group-label">Indėlio terminas mėnesiais</div>
                                <div class="d-flex">
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="6">
                                        <span class="fake-radio-input">6</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="12">
                                        <span class="fake-radio-input">12</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="24" checked>
                                        <span class="fake-radio-input">24</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="36">
                                        <span class="fake-radio-input">36</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="48">
                                        <span class="fake-radio-input">48</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="terminas" value="60">
                                        <span class="fake-radio-input">60</span>
                                    </label>
                                </div>
                            </div>
                            <div class="input-group input-group-radio input-group-radio-senior">
                                <div class="mb-2 input-group-label">Ar esate senjoras?</div>
                                <div class="d-flex">
                                    <label class="radio-input-label">
                                        <input type="radio" name="senior" value="1">
                                        <span class="fake-radio-input">Ne</span>
                                    </label>
                                    <label class="radio-input-label">
                                        <input type="radio" name="senior" value="1" checked>
                                        <span class="fake-radio-input">Taip</span>
                                    </label>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="calc-results">
                                <div class="calc-results-top">
                                    Termino gale bus išmokėta
                                </div>
                                <div class="calc-results-bottom">
                                    €5,300
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
