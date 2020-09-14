<?php
namespace CodeOpera;

class CustomTaxonomy {

    public $names;
    public $post_types;
    public $args;

    function __construct( $names, $post_types = array(), $args = array() ) {

        $this->names = $names;
        $this->post_types = $post_types;
        $this->args = $args;

        add_action( 'init', array( $this, 'register_taxonomy' ) );
    }

    function register_taxonomy() {

        $slug = $this->names['slug'];
        $singular = $this->names['singular'];
        $plural = $this->names['plural'];
        $menu_name = ( ! empty( $this->names['menu'] ) ) ? $this->names['menu'] : $this->names['plural'];
        $all_items = ( ! empty( $this->names['all_items'] ) ) ? $this->names['all_items'] : 'All ' . $this->names['plural'];
        $post_types = $this->post_types;

        $labels = array(
            'name'               => sprintf( _x( '%s', 'plural', 'co_admin' ), $plural ),
            'singular_name'      => sprintf( _x( '%s', 'singular', 'co_admin' ), $singular ),
            'menu_name'          => sprintf( _x( '%s', 'menu', 'co_admin' ), $menu_name ),
            'all_items'          => sprintf( _x( '%s', 'all_items', 'co_admin' ), $all_items ),
        );

        $default_args = array(
            'labels' => $labels,
            'rewrite' => false,
            'hierarchical' => false,
            'show_admin_column' => false,
            'meta_box_cb' => false,
        );
        
        $args = array_replace_recursive( $default_args, $this->args );

        if ( ! taxonomy_exists( $slug ) ) {
            register_taxonomy( $slug, $post_types, $args );
        }
    }
}