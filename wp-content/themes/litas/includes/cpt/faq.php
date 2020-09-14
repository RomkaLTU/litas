<?php
$names = array(
    'slug' => 'faq',
    'singular' => 'FAQ',
    'plural' => 'FAQ',
    'menu' => 'FAQ',
    'all_items' => 'All FAQ',
);
$args = array(
    'menu_position' => 15,
    'menu_icon' => 'dashicons-editor-help',
    'rewrite' => true,
    'supports' => array( 'title', 'editor' ),
);
new \CodeOpera\CustomPostType( $names, $args );

// admin columns
function co_manage_faq_posts_columns( $columns ) {
    unset( $columns['date'] );
    return $columns;
}
add_filter( 'manage_faq_posts_columns', 'co_manage_faq_posts_columns' );