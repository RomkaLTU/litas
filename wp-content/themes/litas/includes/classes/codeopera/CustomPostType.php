<?php
namespace CodeOpera;

class CustomPostType {

    public $names;
    public $args;

    function __construct( $names, $args = array() ) {

        $this->names = $names;
        $this->args = $args;

        add_action( 'init', array( $this, 'register_post_type' ) );
    }

    function register_post_type() {

        $slug = $this->names['slug'];
        $singular = $this->names['singular'];
        $plural = $this->names['plural'];
        $menu_name = ( ! empty( $this->names['menu'] ) ) ? $this->names['menu'] : $this->names['plural'];
        $all_items = ( ! empty( $this->names['all_items'] ) ) ? $this->names['all_items'] : 'All ' . $this->names['plural'];
        
        $labels = array(
            'name'               => sprintf( _x( '%s', 'plural', 'co_admin' ), $plural ),
            'singular_name'      => sprintf( _x( '%s', 'singular', 'co_admin' ), $singular ),
            'menu_name'          => sprintf( _x( '%s', 'menu', 'co_admin' ), $menu_name ),
            'all_items'          => sprintf( _x( '%s', 'all_items', 'co_admin' ), $all_items ),
            'add_new'            => __( 'Add New', 'co_admin' ),
            'add_new_item'       => sprintf( __( 'Add New %s', 'co_admin' ), $singular ),
            'edit_item'          => sprintf( __( 'Edit %s', 'co_admin' ), $singular ),
            'new_item'           => sprintf( __( 'New %s', 'co_admin' ), $singular ),
            'view_item'          => sprintf( __( 'View %s', 'co_admin' ), $singular ),
            'search_items'       => sprintf( __( 'Search %s', 'co_admin' ), $plural ),
            'not_found'          => sprintf( __( 'No %s found', 'co_admin' ), $plural ),
            'not_found_in_trash' => sprintf( __( 'No %s found in Trash', 'co_admin' ), $plural ),
            'parent_item_colon'  => sprintf( __( 'Parent %s:', 'co_admin' ), $singular )
        );

        $default_args = array(
            'labels'             => $labels,
            'rewrite'            => false,
            'has_archive'        => false,
            'supports'           => array( 'title' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'hierarchical'       => false,
        );

        $args = array_replace_recursive( $default_args, $this->args );

        if ( ! post_type_exists( $slug ) ) {
            register_post_type( $slug, $args );
        }
    }
}