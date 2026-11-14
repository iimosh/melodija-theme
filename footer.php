<footer class="site-footer">
    <div class="site-footer__inner">

        <div class="site-footer__brand">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <p class="site-footer__script">Macedonia Ohrid</p>
                <p class="site-footer__name"><?php bloginfo( 'name' ); ?></p>
                <p class="site-footer__sub">Souvenir shop · Since 1992</p>
            <?php endif; ?>
            <p class="site-footer__tagline"><?php echo esc_html( melodija_mod( 'hero_tagline' ) ); ?></p>
        </div>

        <nav class="site-footer__col" aria-label="Footer">
            <h2 class="site-footer__title">Explore</h2>
            <ul>
                <?php foreach ( melodija_sections() as $id => $label ) : ?>
                    <?php if ( 'top' === $id ) continue; ?>
                    <li><a href="<?php echo esc_url( home_url( '/#' . $id ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-footer__col">
            <h2 class="site-footer__title">Visit</h2>
            <p>Melodija Souvenir Shop<br>Ohrid, North Macedonia</p>
            <p><a href="<?php echo esc_url( melodija_directions_url() ); ?>" target="_blank" rel="noopener">Get directions →</a></p>
        </div>

        <div class="site-footer__col">
            <h2 class="site-footer__title">Follow</h2>
            <p><a href="<?php echo esc_url( melodija_mod( 'instagram_url' ) ); ?>" target="_blank" rel="noopener">Instagram →</a></p>
        </div>

    </div>

    <div class="site-footer__bottom">
        <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> Souvenir Shop · Ohrid</p>
        <a href="#">Back to top ↑</a>
    </div>
<!--    <p class="site-footer__giant" aria-hidden="true">--><?php //bloginfo( 'name' ); ?><!--</p>-->
</footer>

<?php wp_footer(); ?>
</body>
</html>
