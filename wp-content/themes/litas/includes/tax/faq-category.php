<?php
$names = array(
    'slug' => 'faq-category',
    'singular' => 'Category',
    'plural' => 'Categories',
    'menu' => 'Categories',
    'all_items' => 'All categories',
);
$post_types = array( 'faq' );
$args = array(
    'show_admin_column' => true,
    'meta_box_cb' => 'post_categories_meta_box',
    'rewrite' => array(
        'slug' => 'faq/category',
        'with_front' => false,
    ),
);

new \CodeOpera\CustomTaxonomy( $names, $post_types, $args );