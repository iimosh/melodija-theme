<?php
/**
 * Customizer: texts and links the shop can change in
 * WP Admin → Appearance → Customize → "Melodija homepage", with a live preview.
 */

/** Default values, used until someone changes them in the Customizer. */
function melodija_customizer_defaults() {
    return array(
        'hero_tagline'    => 'Take a little piece of Ohrid home.',
        'made_by_us_text' => 'Many of our souvenirs are <em>made by us</em>, so you get them at the best price.',
        'marquee_words'   => 'Ohrid, Since 1992, Souvenir shop, Macedonia, Come visit us, Get Directions',
        'instagram_url'   => 'https://www.instagram.com/melodija.souvenirshop/',
        'maps_url'        => 'https://www.google.com/maps/place/Melodija+Souvenir+Shop/@41.1166071,20.7992904,17z',
    );
}

/** Read one setting: the saved value, or the default if nothing was saved yet. */
function melodija_mod( $key ) {
    $defaults = melodija_customizer_defaults();
    return get_theme_mod( $key, $defaults[ $key ] );
}

function melodija_sanitize_em_only( $value ) {
    return wp_kses( $value, array( 'em' => array() ) );
}

function melodija_customize_register( $wp_customize ) {
    $defaults = melodija_customizer_defaults();

    // A "section" is a panel in the Customizer sidebar
    $wp_customize->add_section( 'melodija_homepage', array(
        'title'    => 'Melodija Homepage',
        'priority' => 30,
    ) );

    // Each field = a SETTING (the saved value) + a CONTROL (the input box you see)
    $fields = array(
        'hero_tagline'    => array( 'Hero tagline', 'text', 'sanitize_text_field', '' ),
        'made_by_us_text' => array( '"Made by us" text', 'textarea', 'melodija_sanitize_em_only', 'Wrap words in <em>…</em> to give them the wavy red underline.' ),
        'marquee_words'   => array( 'Indigo band words', 'text', 'sanitize_text_field', 'Separate with commas.' ),
        'instagram_url'   => array( 'Instagram link', 'url', 'esc_url_raw', '' ),
        'maps_url'        => array( 'Google Maps link', 'url', 'esc_url_raw', '' ),
    );

    foreach ( $fields as $key => $field ) {
        list( $label, $type, $sanitize, $description ) = $field;

        $wp_customize->add_setting( $key, array(
            'default'           => $defaults[ $key ],
            'sanitize_callback' => $sanitize,
        ) );

        $wp_customize->add_control( $key, array(
            'label'       => $label,
            'description' => $description,
            'section'     => 'melodija_homepage',
            'type'        => $type,
        ) );
    }
}
add_action( 'customize_register', 'melodija_customize_register' );

function melodija_directions_url() {
    return 'https://www.google.com/maps/dir/?api=1&destination=Melodija+Souvenir+Shop+Ohrid';
}
