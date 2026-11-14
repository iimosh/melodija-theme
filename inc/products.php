<?php
/**
 * Products
 * 1. Adds a "Products" section to WP Admin (a custom post type).
 * 2. melodija_get_products() reads them for the homepage.
 */

function melodija_register_products() {
    register_post_type( 'melodija_product', array(
        'labels'        => array(
            'name'               => 'Products',
            'singular_name'      => 'Product',
            'add_new_item'       => 'Add new product group',
            'edit_item'          => 'Edit product group',
            'featured_image'     => 'Product photo',
            'set_featured_image' => 'Set product photo',
        ),
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-products',
        'menu_position' => 5,
        'supports'      => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
    ) );

    register_taxonomy( 'melodija_product_tag', 'melodija_product', array(
        'labels'            => array(
            'name'          => 'Product tags',
            'singular_name' => 'Product tag',
            'add_new_item'  => 'Add new tag',
        ),
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
    ) );
}
add_action( 'init', 'melodija_register_products' );

// WordPress hides the Excerpt box by default, we need to show it
function melodija_show_excerpt_box( $hidden, $screen ) {
    if ( 'melodija_product' === $screen->post_type ) {
        $hidden = array_diff( $hidden, array( 'postexcerpt' ) );
    }
    return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'melodija_show_excerpt_box', 10, 2 );

/**
 * Returns the products for the homepage.
 * Reads them from WP Admin → Products. If none exist yet, uses the default list below.
 */
function melodija_get_products() {
    $query = new WP_Query( array(
        'post_type'      => 'melodija_product',
        'posts_per_page' => -1,                         // all of them
        'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'ASC' ),
        'no_found_rows'  => true,
    ) );

    if ( ! $query->have_posts() ) {
        return melodija_default_products();
    }

    $products = array();

    while ( $query->have_posts() ) {
        $query->the_post();

        $products[] = array(
            'name'     => get_the_title(),
            'text'     => has_excerpt() ? get_the_excerpt() : '',
            'tags'     => wp_get_post_terms( get_the_ID(), 'melodija_product_tag', array( 'fields' => 'names' ) ),
            'image_id' => get_post_thumbnail_id(),      // ID of the photo in the Media Library
        );
    }

    wp_reset_postdata();

    return $products;
}

/** Shown until the first product is added in WP Admin. */
function melodija_default_products() {
    return array(
    array(
        'name'  => 'Cups & mugs',
        'text'  => 'So many shapes and designs, from classic mugs to cups you won\'t find anywhere else.',
        'tags'  => array( 'Mugs', 'Cups', 'Many shapes' ),
        'image' => 'hero-cup.png',
        'small' => true,
    ),
    array(
        'name'  => 'Tote bags',
        'text'  => 'Canvas bags with Ohrid and Macedonian designs, for the beach, the market or every day.',
        'tags'  => array( 'Big totes', 'Mini totes' ),
        'image' => 'tote_bags.webp',
    ),
    array(
        'name'   => 'Wallets & pouches',
        'text'   => 'Wallets in every size, coin purses, and pouches that work just as well as a makeup bag.',
        'tags'   => array( 'Wallets', 'Coin purses', 'Makeup bags' ),
        'image'  => 'wallets.webp',
    ),
    array(
        'name'  => 'Soaps & gift bags',
        'text'  => 'Soaps on their own or tucked into a little bag, ready to give as a gift.',
        'tags'  => array('With gift bag', 'With gift box', 'Natural Glycerin Soaps', 'Loofah Soap' ),
        'image' => 'mini_bags_soap.webp',
    ),
    array(
        'name'   => 'Kitchen textiles',
        'text'   => 'Tea towels and pot holders with traditional motifs, a souvenir you\'ll use every day.',
        'tags'   => array( 'Tea towels', 'Pot holders' ),
        'image'  => 'towels.webp',
    ),
    array(
        'name'  => 'Magnets',
        'text'  => 'The classic souvenir, in many designs of Ohrid, the lake and Macedonia.',
        'tags'  => array( 'Wooden', 'Ceramic', 'Metal' ),
        'image' => 'magnets.webp',
    ),
    array(
        'name'  => 'Puzzles',
        'text'  => '500-piece puzzles of Ohrid and Macedonia, to rebuild the view at home.',
        'tags'  => array( '500 pieces', 'Ohrid', 'Macedonia' ),
        'image' => 'puzzle.webp',
    ),
);
}
