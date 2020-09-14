<?php
// additional menu classes
function co_nav_menu_css_class( $classes, $item, $args ) {
    $menu_names = array( 'primary', 'social', 'extra', 'footer' );
    if ( in_array( $args->theme_location, $menu_names ) ) {
        $classes[] = 'nav-item';
        if ( in_array( 'current-menu-item', $classes ) ) {
            $classes[] = 'active';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'co_nav_menu_css_class', 10, 3 );
function co_nav_menu_link_attributes( $atts, $item, $args ) {
    $menu_names = array( 'primary', 'social', 'extra', 'footer' );
    if ( in_array( $args->theme_location, $menu_names ) ) {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'co_nav_menu_link_attributes', 10, 3 );
// responsive embeds
function co_embed_oembed_html( $html ){
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // strip width and height
    return '<div class="embed-responsive embed-responsive-16by9 mb-4">' . $html. ' </div>'; // wrap in responsive div element
}
add_filter( 'embed_oembed_html', 'co_embed_oembed_html', 10, 1 );