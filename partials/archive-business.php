<?php 
/**
 * Archive partial for business
 *
 * @package      Guide To Malaga 2023
 * @author       Luis Colomé
 * @since        0.4.5
 * @license      GPL-2.0+
**/


?>
<article class="directory__item business post-type-directory">


        <header class="business__header">
            <figure class="business__img">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
            </figure>
        

            <h2 class="business__title"><?php the_title(); ?></h2>
        </header>

        <div class="business__content">
            <div class="business__content__inner">

                <?php                    
                    $my_excerpt = get_the_excerpt();
                    if( $my_excerpt ){
                        echo wpautop( $my_excerpt );
                    }
                    else {?>
                    <p class="business_excerpt"><?php echo substr(strip_tags(get_the_content()), 0, 140); ?></p>
                    <?php } ?>
                
                <div class="business__links">
                    
                    <div class="business__link">
                        <?php                    
                    $button_text = get_field('drtr_button_text', $post->ID);
                    $button_link = get_field('drtr_button_link', $post->ID);
                    if( $button_link ){?>
                        <a class="kb-button kt-button button kt-btn-size-standard kt-btn-width-type-auto kb-btn-global-inherit kt-btn-has-text-true kt-btn-has-svg-false wp-block-button__link wp-block-kadence-singlebtn" href="<?php echo $button_link; ?>"><span class="kt-btn-inner-text"><?php echo $button_text; ?></span></a>
                    <?php } else {?>
                        <a class="kb-button kt-button button kt-btn-size-standard kt-btn-width-type-auto kb-btn-global-inherit kt-btn-has-text-true kt-btn-has-svg-false wp-block-button__link wp-block-kadence-singlebtn" href="<?php echo get_permalink(); ?>"><span class="kt-btn-inner-text">View more</span></a>
                    <?php } ?>
                    </div>
                                            
                </div>

            </div>
            
        </div>
    

</article>
