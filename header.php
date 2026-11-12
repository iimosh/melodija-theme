<!DOCTYPE html>
<html <?php language_attributes(); /* prints lang="en-US" based on WordPress settings */ ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    // REQUIRED in every theme. WordPress prints here: the <title>, your CSS
    // (from functions.php), and anything plugins need. Without it, nothing loads.
    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();?>

<header class="site-header">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo( 'name' ); ?>
    </a>

    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => 'nav',
    ) );
    ?>
</header>
