<?php
get_header();
?>

<main>

    <section class="hero" id="top">
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

    <?php $products = melodija_get_products(); ?>


    <section class="products" id="products">
        <header class="section-head reveal">
            <p class="section-head__script">What we offer</p>
            <h2 class="section-head__title">Souvenirs for <em>every</em> story</h2>
            <p class="section-head__text">A big variety of designs in seven families. Here's a taste; come to the shop to see them all.</p>
        </header>

        <div class="products__list">
            <?php
            foreach ( $products as $i => $product ) {
                get_template_part( 'template-parts/product-row', null, array_merge( $product, array(
                    'number' => $i + 1,
                    'total'  => count( $products ),
                ) ) );
            }
            ?>
        </div>
    </section>

    <section class="made-by-us" id="made-by-us">
        <div class="marquee" aria-hidden="true">
            <div class="marquee__track">
                <?php for ( $copy = 0; $copy < 2; $copy++ ) : ?>
                    <?php foreach ( $products as $product ) : ?>
                        <span><?php echo esc_html( $product['name'] ); ?> ✦</span>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
        </div>

        <div class="made-by-us__inner reveal">
            <p class="made-by-us__label">Good to know</p>
            <p class="made-by-us__statement">Many of our souvenirs are <em>made by us</em>, so you get them at the best price.</p>
        </div>
    </section>

    <section class="reviews" id="reviews">
        <header class="section-head reveal">
            <p class="section-head__script">Kind words</p>
            <h2 class="section-head__title">What our <em>visitors</em> say</h2>
            <p class="section-head__text">Real reviews from our Google profile.</p>
        </header>

        <div class="reviews__widget reveal">
            <?php melodija_shortcode( 'trustindex', '[trustindex no-registration=google]' ); ?>
        </div>
    </section>

    <div class="marquee marquee--indigo" aria-hidden="true">
        <div class="marquee__track">
            <?php for ( $copy = 0; $copy < 2; $copy++ ) : ?>
                <?php foreach ( array( 'Ohrid', 'Since 1992', 'Souvenir shop', 'Macedonia', 'Come visit us', 'Get Directions' ) as $word ) : ?>
                    <span><?php echo esc_html( $word ); ?> ✦</span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <?php
    $maps_url       = 'https://www.google.com/maps/place/Melodija+Souvenir+Shop/@41.1166071,20.7992904,17z';
    $directions_url = 'https://www.google.com/maps/dir/?api=1&destination=Melodija+Souvenir+Shop+Ohrid';
    ?>
    <section class="visit" id="visit">
        <header class="section-head reveal">
            <p class="section-head__script">Come say hi</p>
            <h2 class="section-head__title">Find us in <em>Ohrid</em></h2>
        </header>

        <div class="visit__map reveal">
            <iframe
                src="https://www.google.com/maps?q=Melodija+Souvenir+Shop,+Ohrid&amp;ll=41.1166071,20.7992904&amp;z=17&amp;output=embed"
                title="Map showing Melodija Souvenir Shop in Ohrid"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="visit__card">
                <p class="visit__name">Melodija Souvenir Shop</p>
                <p class="visit__place">Ohrid, North Macedonia</p>
                <div class="visit__actions">
                    <a class="button" href="<?php echo esc_url( $directions_url ); ?>" target="_blank" rel="noopener">Get directions</a>
                    <a class="visit__link" href="<?php echo esc_url( $maps_url ); ?>" target="_blank" rel="noopener">Open in Google Maps →</a>
                </div>
            </div>
        </div>
    </section>

    <section class="insta" id="instagram">
        <header class="section-head reveal">
            <p class="section-head__script">@melodija.souvenirshop</p>
            <h2 class="section-head__title">Follow us on <em>Instagram</em></h2>
            <p class="section-head__text">New arrivals, shop moments and Ohrid views.</p>
        </header>

        <div class="insta__feed reveal">
            <?php melodija_shortcode( 'instagram-feed', '[instagram-feed feed=1]' ); ?>
        </div>

        <p class="insta__cta">
            <a class="button" href="https://www.instagram.com/melodija.souvenirshop/" target="_blank" rel="noopener">Follow @melodija.souvenirshop</a>
        </p>
    </section>

</main>

<?php get_footer(); ?>
