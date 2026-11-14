<?php
/**
 * SEO & sharing: what Google, WhatsApp, Instagram and Facebook see about the site.
 * Everything here is printed inside <head> through wp_head().
 */

/** Meta description + Open Graph tags */
function melodija_seo_meta() {
    $description = melodija_mod( 'meta_description' );
    $share_image = get_theme_file_uri( 'assets/images/share.jpg' );
    ?>
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $share_image ); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <?php
}
add_action( 'wp_head', 'melodija_seo_meta', 1 );

function melodija_structured_data() {
    if ( ! is_front_page() ) {
        return;
    }

    $data = array(
        '@context'     => 'https://schema.org',
        '@type'        => 'Store',
        'name'         => 'Melodija Souvenir Shop',
        'url'          => home_url( '/' ),
        'image'        => get_theme_file_uri( 'assets/images/share.jpg' ),
        'description'  => melodija_mod( 'meta_description' ),
        'foundingDate' => '1992',
        'address'      => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Ohrid',
            'addressCountry'  => 'MK',
        ),
        'geo'          => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 41.1166071,
            'longitude' => 20.7992904,
        ),
        'hasMap'       => melodija_mod( 'maps_url' ),
        'sameAs'       => array( melodija_mod( 'instagram_url' ) ),
    );

    // wp_json_encode turns the PHP array into JSON text
    echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'melodija_structured_data' );

/** Tab icon: uses the Site Icon from the Customizer if set, otherwise the theme's own icon. */
function melodija_fallback_favicon() {
    if ( has_site_icon() ) {
        return;
    }
    $icon = get_theme_file_uri( 'assets/images/site-icon.png' );
    echo '<link rel="icon" href="' . esc_url( $icon ) . '" sizes="512x512">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . esc_url( $icon ) . '">' . "\n";
}
add_action( 'wp_head', 'melodija_fallback_favicon' );
