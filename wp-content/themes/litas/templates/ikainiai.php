<?php

/*
Template Name: Įkainiai
*/

get_header();

$items = get_field('items');
?>

<div class="main-content-wrapper flex-fill position-relative">
    <div class="main-content animate-links">
        <div class="main-padding-top section">
            <div class="container">
                <h1 class="section-title">Paslaugų įkainiai ir tarifai</h1>
                <div class="table-responsive">
                    <table class="table table-custom-2">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-left">Paslaugos pavadinimas</th>
                            <th scope="col">Kredito unijos įkainiai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <?php if ($item['bold']): ?>
                                <tr class="first">
                            <?php elseif ($item['last']): ?>
                                <tr class="last">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>
                                <td>
                                    <?php if ($item['underline']): ?>
                                        <div class="underline mb-3"><?php echo $item['title'] ?></div>
                                    <?php else: ?>
                                        <?php echo $item['title'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="max-w-220px mx-auto">
                                        <?php echo $item['price'] ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
