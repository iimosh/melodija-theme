<?php
get_header();
?>

<main>

    <section class="hero">
        <div class="hero__wordmark">
            <p class="hero__script">Macedonia Ohrid</p>
            <h1 class="hero__title">
                Melodija
                <span class="hero__sub">Souvenir shop</span>
            </h1>
            <p class="hero__year">1992</p>
        </div>

        <div class="hero__products" aria-hidden="true">
            <?php melodija_image( 'hero-cup.png', 'Melodija cup', 'float float--cup' ); ?>
            <?php melodija_image( 'hero-purse.png', 'Melodija mini purse', 'float float--purse' ); ?>
            <?php melodija_image( 'hero-tote.png', 'Melodija tote bag', 'float float--tote' ); ?>
        </div>

        <div class="hero__arch">
            <p class="hero__tagline">Take a little piece of Ohrid home.</p>

            <svg class="badge" viewBox="0 0 200 200" aria-hidden="true">
                <defs>
                    <path id="badge-circle" d="M100,100 m-76,0 a76,76 0 1,1 152,0 a76,76 0 1,1 -152,0" />
                </defs>
                <text>
                    <textPath href="#badge-circle" textLength="470">Souvenir shop · Ohrid · Since 1992 ·</textPath>
                </text>
                <text class="badge__center" x="100" y="115" text-anchor="middle">M</text>
            </svg>

            <a class="hero__scroll" href="#products">Scroll to discover</a>
        </div>
    </section>

    <section id="products"></section>

</main>

<?php get_footer(); ?>
