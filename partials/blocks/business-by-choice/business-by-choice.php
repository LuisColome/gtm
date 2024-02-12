<?php
/*
 * Business by choice for Guidetomalaga.com site. 
 * 
 * 
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'business-by-choice-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'business-by-choice';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

global $post;

$business_choice = get_field('gtm_business_by_choice' );

$args = array(
    'post_type'         => 'directory',
    'posts_per_page' => -1, 
    'orderby'           => 'rand', 
    // 'post__in'          => $business_choice,
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>
    <section class="directory directory__container">
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
        
        // get_template_part( 'partials/archive-project.php' );
        get_template_part( 'partials/' . 'archive', 'business' );

        endwhile; ?>
    </section>

<?php endif;
wp_reset_query(); // Restore global post data stomped by the_post().
