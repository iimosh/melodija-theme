<?php
/**
 * functions.php
 * WordPress runs this file automatically when your theme is active.
 * It's where you "switch on" features and load your CSS/JS.
 */

function melodija_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'melodija_setup' );

require get_theme_file_path( 'inc/products.php' );
require get_theme_file_path( 'inc/customizer.php' );

/** The homepage sections shown in the menu: id => label. The ids match the <section id="..."> in front-page.php. */
function melodija_sections() {
    return array(
        'top'        => 'Home',
        'products'   => 'Products',
        'reviews'    => 'Reviews',
        'visit'      => 'Location',
        'instagram'  => 'Instagram',
    );
}

function melodija_assets() {
    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'melodija-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;700&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,400&family=Yellowtail&display=swap',
        array(),
        null
    );

    wp_enqueue_style( 'melodija-style', get_stylesheet_uri(), array( 'melodija-fonts' ), $version );

    wp_enqueue_script( 'melodija-main', get_theme_file_uri( 'assets/js/main.js' ), array(), $version, array( 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'melodija_assets' );

function melodija_image( $file, $alt, $class = '' ) {
    $path = get_theme_file_path( 'assets/images/' . $file );
    $url  = get_theme_file_uri( 'assets/images/' . $file );

    if ( file_exists( $path ) ) {
        $url = add_query_arg( 'v', filemtime( $path ), $url );
        printf( '<img class="%s" src="%s" alt="%s">', esc_attr( $class ), esc_url( $url ), esc_attr( $alt ) );
    } else {
        printf( '<div class="%s placeholder" role="img" aria-label="%s"><span>%s</span></div>', esc_attr( $class ), esc_attr( $alt ), esc_html( $file ) );
    }
}

/** True for image types that can have a transparent background (our cutouts). */
function melodija_is_cutout( $file ) {
    return in_array( strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ), array( 'png', 'webp' ), true );
}

/**
 * Runs a plugin shortcode, but only if that plugin is active.
 * (If the plugin is off, do_shortcode would print the raw "[instagram-feed ...]" text on the page.)
 */
function melodija_shortcode( $tag, $shortcode ) {
    if ( shortcode_exists( $tag ) ) {
        echo do_shortcode( $shortcode );
    }
}
