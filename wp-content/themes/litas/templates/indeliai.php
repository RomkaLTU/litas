<?php

/*
Template Name: Indeliai
*/

get_header();
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title section-title-max-w">Didelės terminuotų indėlių palūkanos</h1>

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
                        <td>6</td>
                        <td>1%</td>
                        <td class="table-custom-1-rowspan" rowspan="6">
                            +0.1%
                        </td>
                        <td class="table-custom-1-rowspan" rowspan="6">
                            +0.1%
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>2.27%</td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>2.4%</td>
                    </tr>
                    <tr>
                        <td>36</td>
                        <td>2.5%</td>
                    </tr>
                    <tr>
                        <td>48</td>
                        <td>2.6%</td>
                    </tr>
                    <tr>
                        <td>60</td>
                        <td>2.7%</td>
                    </tr>
                    </tbody>
                </table>

                <ul class="centered-list">
                    <li>Minimali indėlio suma 1000 eurų</li>
                    <li>Indėlio papildymas bet kuriuo metu (min. suma 1000 eurų)</li>
                    <li>Indėlio palūkanos išmokamos kas 3 mėnesius</li>
                    <li>Automatinis indėlio pratęstimas</li>
                </ul>
            </div>
            <div class="section-cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="section-cta-title">Litas kredito unijos indėliai iki 100 000 eurų yra apdrausti valstybinėje įmonėje “Indėlių ir investicijų draudimas”</h2>
                            <a href="#" class="section-cta-link">Papildoma informacija indėlininkams</a>
                        </div>
                        <div class="col text-center text-lg-right">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/IID-Logotipas 1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
