<?php
//add_filter( 'script_loader_tag', 'add_integrity_crossorigin', 10, 3 );
add_filter( 'style_loader_tag', 'co_add_integrity_crossorigin', 10, 4 );

function co_add_integrity_crossorigin( $tag, $handle, $src, $media = null ) {
    global $wp_scripts, $wp_styles;

    if ( null === $media ) {
        $tag_name = 'script';
        $resource_object = $wp_scripts;
    } else {
        $tag_name = 'link';
        $resource_object = $wp_styles;
    }

    if ( ! empty( $resource_object->registered[$handle]->extra['integrity'] ) ) {
        if ( preg_match( '/integrity="[^"]*"/', $tag, $match ) ) {
            $tag = str_replace( $match[0], 'integrity="' . esc_attr( $resource_object->registered[$handle]->extra['integrity'] ) . '"', $tag );
        } else {
            $tag = str_replace( '<' . $tag_name . ' ', '<' . esc_attr( $tag_name ) . ' integrity="' . esc_attr( $resource_object->registered[$handle]->extra['integrity'] ) . '" ', $tag );
        }
    }

    if ( ! empty( $resource_object->registered[$handle]->extra['crossorigin'] ) ) {
        if ( preg_match( '/crossorigin="[^"]*"/', $tag, $match ) ) {
            $tag = str_replace( $match[0], 'crossorigin="' . esc_attr( $resource_object->registered[$handle]->extra['crossorigin'] ) . '"', $tag );
        } else {
            $tag = str_replace( '<' . $tag_name . ' ', '<' . esc_attr( $tag_name ) . ' crossorigin="' . esc_attr( $resource_object->registered[$handle]->extra['crossorigin'] ) . '" ', $tag );
        }
    }

    return $tag;
}