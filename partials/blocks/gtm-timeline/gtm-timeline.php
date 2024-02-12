<?php
/**
 * GuidetoMalaga's Timeline
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
$class_name = 'gtm-timeline timeline';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Check rows exists.
if( have_rows('timeline', 'options') ): ?>

    <div <?php echo $anchor; ?> class="gtm-timeline timeline <?php echo esc_attr( $class_name ); ?>">
        <div class="timeline__inner">

            <?php 
            // Loop through odd rows.
            $i = 0;
            while( has_sub_field('timeline', 'options') ) : $i++;

                // Load sub field value.
                $index = get_row_index();
                $title = get_sub_field('timeline_item_title', 'options');
                $content = get_sub_field('timeline_item_content', 'options');
                
                if( get_row_index() % 2 == 1 ){ ?>
                    <div class="timeline__item">
                        <?php if( $title ) { ?>
                            <h5 class="timeline__title"><?php echo $title; ?></h5>
                        <?php } ?>
                        <?php if( $content ) { ?>
                            <div class="timeline__content"><?php echo $content; ?></div>
                        <?php } ?>
                    </div>
                    <div class="timeline__empty"></div>
                <?php }

                if( get_row_index() % 2 == 0 ){ ?>
                    <div class="timeline__empty"></div>
                    <div class="timeline__item">
                        <?php if( $title ) { ?>
                            <h5 class="timeline__title"><?php echo $title; ?></h5>
                        <?php } ?>
                        <?php if( $content ) { ?>
                            <div class="timeline__content"><?php echo $content; ?></div>
                        <?php } ?>
                    </div>
                <?php }

            // End loop.
            endwhile;
            ?>

        </div>
    </div>

<?php 
// No value.
else :
   // Do something...
endif;