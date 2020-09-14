<?php

class Helper {

    public static function get_page_id_by_template( $filename ) {
        $page_id_arr = get_posts( array(
            'post_type' => 'page',
            'fields' => 'ids',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => $filename,
            'posts_per_page' => 1,
        ) );
        if ( ! empty( $page_id_arr ) ) {
            return $page_id_arr[0];
        }
        return false;
    }

}