<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <p class="site-header__note">Ohrid · Since 1992</p>

    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <span class="logo__name"><?php bloginfo( 'name' ); ?></span>
        <span class="logo__sub">Souvenir shop</span>
    </a>

   <button class="menu-button" aria-expanded="false" aria-controls="menu-overlay">
        <span class="menu-button__label">Menu</span>
        <span class="menu-button__dot" aria-hidden="true">+</span>
    </button>
</header>

<div class="menu-overlay" id="menu-overlay" hidden>
    <nav class="menu-overlay__nav" aria-label="Main">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
        ) );
        ?>
    </nav>
    <p class="menu-overlay__footer">Macedonia · Ohrid · Since 1992</p>
</div>
