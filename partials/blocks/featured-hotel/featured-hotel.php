<?php
/**
 * Featured hotel
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */ 

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'fh-item featured-hotel';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Chosen hotels
$featured_hotel = get_field('fhitem_hotel_selected' );
$himage = get_field('fhitem_hotel_image' );
$size = 'large';


// Block's HTML.

// Post (Guide items) variables
$id = get_the_ID();
$cats = get_the_category($featured_hotel);
$content = get_the_content();
// Booking affiliated link
$hurl = get_field('booking_link', $featured_hotel);
?>

    <div class="fh-item">
        <div class="fh-item__container">
            <span class="fh-item__tag">
                <?php echo $cats[0]->name; ?>
            </span>
            <div class="fh-item__content">
                <a href="<?php echo esc_attr( $hurl ); ?>"  class="fh-item__title__link">
                    <h3 class="fh-item__title"><?php echo esc_html( $featured_hotel->post_title ); ?></h3>
                </a>
                <figure class="fh-item__image">
                    <?php if( !empty( $himage ) ) { ?>
                    <img src="<?php echo esc_url($himage['url']); ?>" alt="<?php echo esc_attr($himage['alt']); ?>" />
                    <?php } else {
                        echo get_the_post_thumbnail( $featured_hotel, 'medium_large', array( 'class' => 'aligncenter' ) );
                    } ?>
                </figure>
                <p class="fh-item__text"><?php echo substr(strip_tags(get_post_field('post_content',$featured_hotel)), 0, 320);?> ...</p>
                <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_attr( $hurl ); ?>">Check Price</a></div>
                </div>
            </div>
        </div>
    </div>

<?php