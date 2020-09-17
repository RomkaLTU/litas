<?php
// includes
define( 'INCLUDE_PATH', dirname( __FILE__ ) . '/includes/' );
// codeopera classes
require_once( INCLUDE_PATH . 'classes/codeopera/CustomPostType.php' );
require_once( INCLUDE_PATH . 'classes/codeopera/CustomTaxonomy.php' );
// local classes
require_once( INCLUDE_PATH . 'classes/Helper.php' );
// custom post types
require_once( INCLUDE_PATH . 'cpt/faq.php' );
// custom taxonomies
require_once( INCLUDE_PATH . 'tax/faq-category.php' );
// customize wordpress
require_once( INCLUDE_PATH . 'wp/bootstrap.php' );
require_once( INCLUDE_PATH . 'wp/admin.php' );
require_once( INCLUDE_PATH . 'wp/integrity.php' );

// anti-caching system
define( 'THEME_CSS_VERSION', '1.01' );
define( 'THEME_JS_VERSION', '1.01' );
define( 'JQUERY_VERSION', '3.51');

// setup theme
function co_after_setup_theme() {
    // language ready
    // load_theme_textdomain( 'litas',  get_template_directory() . '/languages' );

    // add menu
    register_nav_menus( array(
        'primary' => __( 'Primary', 'litas' ),
        'footer' => __( 'Footer', 'litas' ),
    ) );

    // add supports
    add_theme_support( 'title-tag' ); 
    add_theme_support( 'html5', array( 'gallery', 'caption', 'search-form' ) );

    // image sizes
    // add_image_size( 'featured-thumb', 530, 298, true );

    // don't need that for sure
    show_admin_bar( false );

    // load the scripts
    add_action( 'wp_enqueue_scripts', 'co_wp_enqueue_scripts', 999 );
}
add_action( 'after_setup_theme', 'co_after_setup_theme' );

function co_wp_enqueue_scripts() {
    // remove wp emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // remove questionable metas
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );

    // remove embeds support
    wp_deregister_script( 'wp-embed' );

    // remove default gutenberg blocks style
    wp_dequeue_style( 'wp-block-library' );

    // font awesome - https://fontawesome.com/account/cdn
    // wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), null );
    // wp_style_add_data( 'font-awesome', 'integrity', 'sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V' );
    // wp_style_add_data( 'font-awesome', 'crossorigin', 'anonymous' );

    // main style
    wp_enqueue_style( 'main', get_template_directory_uri() . '/dist/css/main.css', array(), THEME_CSS_VERSION );

    // jquery
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), JQUERY_VERSION );
    wp_enqueue_script( 'jquery' );

    // scripts
    wp_enqueue_script( 'litas-main', get_template_directory_uri() . '/dist/js/main.js', array( 'jquery' ), THEME_JS_VERSION, true );
    // wp_localize_script( 'litas-main', 'mainVars', array(
    //     'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
    // ) );
}

// theme options page
function co_acf_init() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page([
            'page_title'    => __( 'Options', 'litas' ),
            'menu_title'    => __( 'Options', 'litas' ),
            'position'      => 40,
            'slug'          => 'options',
            // 'parent_slug'   => 'themes.php'
        ]);
    }
}
add_action( 'acf/init', 'co_acf_init' );

function co_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'co_excerpt_length', 10 );

function co_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'co_excerpt_more' );