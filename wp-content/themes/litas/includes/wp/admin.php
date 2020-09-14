<?php
// clean the dashboard
function co_wp_dashboard_setup() {
    global $wp_meta_boxes;
    // core
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );

    wp_add_dashboard_widget(
        'support', 
        __( 'Support', 'ph' ), 
        'co_support_widget'
    );
}
add_action( 'wp_dashboard_setup', 'co_wp_dashboard_setup', 999 );
remove_action( 'welcome_panel', 'wp_welcome_panel' );

// remove admin menu items
function co_wp_before_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'comments' );
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_menu( 'new-content' );
}
add_action( 'wp_before_admin_bar_render', 'co_wp_before_admin_bar_render' );

function co_admin_head() {
    // hide update notices for non-admin users
    if ( ! current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'co_admin_head' );

// page admin columns unset
function co_manage_edit_page_columns( $columns ) {
    unset( $columns['author'] );
    unset( $columns['date'] );
    return $columns;
}
add_filter( 'manage_edit-page_columns' , 'co_manage_edit_page_columns' );

// remove editor from pages with default templates
function co_admin_init_hide_editor() {
    $post_id = absint( isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : 0 ) );
    if ( ! empty( $post_id ) && get_post_type( $post_id ) === 'page' && ! empty( get_page_template_slug( $post_id ) ) ) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'admin_init', 'co_admin_init_hide_editor' );

// hide other roles
function co_editable_roles( $roles ) {
    unset( $roles['subscriber'] );
    unset( $roles['contributor'] );
    unset( $roles['author'] );
    return $roles;
}
add_filter( 'editable_roles', 'co_editable_roles' );

// extra capabilities for editors
function co_admin_init() {
    if ( get_option( 'co_editor_add_extra_caps' ) !== 'done' ) {
        $role = get_role( 'editor' );

        // yoast seo options
        $role->add_cap( 'wpseo_manage_options' );

        // edit frontend menus
        $role->add_cap( 'edit_theme_options' );

        // manage users
        $role->add_cap( 'edit_users' );
        $role->add_cap( 'list_users' );
        $role->add_cap( 'promote_users' );
        $role->add_cap( 'create_users' );
        $role->add_cap( 'add_users' );
        $role->add_cap( 'delete_users' );

        // loco menu remove
        $role->remove_cap( 'loco_admin' );

        // save em caps
        update_option( 'co_editor_add_extra_caps', 'done' );
    }

    // privacy page edit
    $current_user  = wp_get_current_user();
    if ( in_array( 'editor', $current_user->roles ) ) {
        add_action( 'map_meta_cap', 'co_map_meta_cap', 1, 4 );
    }
}
add_action( 'admin_init', 'co_admin_init' );

// privacy page helper function
function co_map_meta_cap( $caps, $cap, $user_id, $args ) {
    if ( 'manage_privacy_options' === $cap ) {
        $caps = array_diff( $caps, array( 'manage_options' ) );
    }
    return $caps;
}

// hide other stuff after giving editor edit_theme_options
function co_admin_menu() {
    $current_user  = wp_get_current_user();
    if ( in_array( 'editor', $current_user->roles ) ) {
        remove_menu_page( 'tools.php' );
        $customize_submenu_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
        remove_submenu_page( 'themes.php', 'themes.php' );
        remove_submenu_page( 'themes.php', $customize_submenu_url );
    }
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'co_admin_menu' );

// disable gutenberg for posts & post types
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

// disable some /wp-json points for non-admins
add_filter( 'rest_endpoints', function( $endpoints ) {
    $current_user  = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) && ! in_array( 'editor', $current_user->roles ) ) {
        if ( isset( $endpoints['/wp/v2/users'] ) ) {
            unset( $endpoints['/wp/v2/users'] );
        }
        if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
            unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
        }
    }
    return $endpoints;
});

// support widget
function co_support_widget() {
    $admin_email = get_bloginfo( 'admin_email' );
    echo '<p><a class="support-logo" href="https://www.codeopera.com" target="_blank"><img alt="" src="' . get_stylesheet_directory_uri() . '/images/codeopera.svg" width="100"></a></p>';
    echo '<p>' . __( 'Please contact us at', 'litas' ) . ' <a href="mailto:' . $admin_email . '">' . $admin_email . '<a/></p>';
}

// filter yoast plugin meta priority
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

// these things nobody uses
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// some cleaning
function co_remove_stuff_from_post_type() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'post', 'trackbacks' );
    remove_post_type_support( 'page', 'comments' );
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'co_remove_stuff_from_post_type' );

// no more wp-config for revisions
add_filter( 'wp_revisions_to_keep', function() { return 5; } );