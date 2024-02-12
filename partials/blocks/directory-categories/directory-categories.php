<?php

/**

 * List of directory categories for GTM Revamp

 * 

 * @param   array $block The block settings and attributes.

 * @param   string $content The block inner HTML (empty).

 * @param   bool $is_preview True during AJAX preview.

 * @param   (int|string) $post_id The post ID this block is saved to.

 */



// Get the taxonomy's terms

$terms = get_terms(

array(

    'taxonomy'   => 'business-category',
    'hide_empty' => true,

)

);



// Random order

// shuffle($terms);



// Check if any term exists and they are not empty

if ( ! empty( $terms ) && is_array( $terms ) ):

?>

    <div class="lcm-business-categories">

    <?php

    // Run a loop and print them all

        foreach ( $terms as $term ) :

        $term_link = get_term_link( $term );

        // replace the url in the link for  esc_url( get_term_link( $term ) ); for a normal category o term ?>

        <div class="lcm-business-categories__button-wrap">

            <a class="lcm-business-categories__button" href="<?php echo esc_url( $term_link ); ?>">

                <span class="lcm-business-categories__inner-text"><?php echo $term->name; ?></span>

            </a>

        </div>  

        <?php endforeach; ?>

      

<?php endif; ?>



</div>

  

