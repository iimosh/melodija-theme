<?php
/**
 * One product group row.
 * Loaded with get_template_part(), which passes the data in $args.
 */
?>
<article class="product-row reveal">
    <div class="product-row__media">
        <?php
        $classes = 'product-row__img';
        if ( ! empty( $args['small'] ) ) {
            $classes .= ' product-row__img--small';
        }

        if ( ! empty( $args['image_id'] ) ) {
            if ( in_array( get_post_mime_type( $args['image_id'] ), array( 'image/png', 'image/webp' ), true ) ) {
                $classes .= ' product-row__img--cutout';
            }
            echo wp_get_attachment_image( $args['image_id'], 'large', false, array( 'class' => $classes, 'alt' => $args['name'] ) );
        } elseif ( ! empty( $args['image'] ) ) {
            if ( melodija_is_cutout( $args['image'] ) ) {
                $classes .= ' product-row__img--cutout';
            }
            melodija_image( $args['image'], $args['name'], $classes );
        } else {
            echo '<div class="product-row__img placeholder"><span>Add a product photo</span></div>';
        }
        ?>

        <?php if ( ! empty( $args['detail'] ) ) : ?>
            <?php melodija_image( $args['detail'], $args['name'], melodija_is_cutout( $args['detail'] ) ? 'product-row__detail product-row__detail--cutout' : 'product-row__detail' ); ?>
        <?php endif; ?>
    </div>

    <div class="product-row__text">
        <p class="product-row__number"><?php echo esc_html( sprintf( '%02d / %02d', $args['number'], $args['total'] ) ); ?></p>
        <h3 class="product-row__name"><?php echo esc_html( $args['name'] ); ?></h3>
        <p class="product-row__desc"><?php echo esc_html( $args['text'] ); ?></p>

        <?php if ( ! empty( $args['tags'] ) ) : ?>
            <ul class="product-row__tags">
                <?php foreach ( $args['tags'] as $tag ) : ?>
                    <li><?php echo esc_html( $tag ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</article>
