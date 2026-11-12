<?php
/**
 * functions.php
 * WordPress runs this file automatically when your theme is active.
 * It's where you "switch on" features and load your CSS/JS.
 */

function melodija_setup() {
   add_theme_support( 'title-tag' );

     register_nav_menus( array(
        'primary' => 'Main menu',
    ) );
}
add_action( 'after_setup_theme', 'melodija_setup' );

function melodija_assets() {
    wp_enqueue_style(
        'melodija-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'melodija_assets' );
