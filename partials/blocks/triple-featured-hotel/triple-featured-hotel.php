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
$class_name = 'tfh-grid triple-featured-hotel';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

global $post;

// Chosen hotels
$hotel_choice = get_field('tfh_hotels_selected' );

$args = array(
    'post_type'         => 'post',
    // 'order'             => 'ASC',
    'orderby'           => 'rand',
    'post__in'          => $hotel_choice,    
);

// $htag = get_field('fhitem_type_of_hotel' );
// $hname = get_field('fhitem_hotel_name' );
$himage = get_field('fhitem_hotel_image' );
$size = 'medium_large';
// $hdescription = get_field('fhitem_hotel_description' );



$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>

<div class="tfh-grid">
    <div class="tfh-grid__container">
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

            // Post (Guide items) variables
            $id = get_the_ID();
            $cats = get_the_category($id);
            $content = get_the_content();
            // Booking affiliated link
            $hurl = get_field('booking_link', $post->ID);
        ?>

        <div class="tfh-grid__item">
            <div class="tfh-grid__card tfh-grid__card-vertical">  
                <div class="tfh-grid__tag">
                    <span><?php echo $cats[0]->name; ?></span>
                </div>
                <figure class="tfh-grid__image">
                    <?php if( !empty( $himage ) ) { ?>
                        <img src="<?php echo esc_url($himage['url']); ?>" alt="<?php echo esc_attr($himage['alt']); ?>" />
                    <?php } else {
                        echo get_the_post_thumbnail( $id, 'medium', array( 'class' => 'aligncenter' ) );
                    } ?>
                </figure>
                
                <div class="tfh-grid__content">
                    <a href="<?php echo esc_attr( $hurl ); ?>"  class="tfh-grid__title__link">
                        <h3 class="tfh-grid__title"><?php echo the_title(); ?></h3>
                    </a>
                    <p class="tfh-grid__text"><?php echo substr(strip_tags(get_the_content()), 0, 140);?> ...</p>
                    <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_attr( $hurl ); ?>">Check Price</a></div>
                    </div>
                </div>
                
            </div>
        </div>

        <?php endwhile; ?>

    </div>
</div>
<?php endif;
wp_reset_query(); // Restore global post data stomped by the_post().