<?php
 /**
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 790;	
    

// function lcm_child_theme_setup() {
// 	// General cleanup
// 	include_once( get_stylesheet_directory() . '/inc/acf.php' );
// }
// add_action( 'after_setup_theme', 'lcm_child_theme_setup', 15 );



/**
 * Setup Child Theme Styles
 */
function gtm_enqueue_styles() {
	wp_enqueue_style( 'gtm-style', get_stylesheet_directory_uri() . '/assets/css/main.css', false, '0.1.0' );
}
add_action( 'wp_enqueue_scripts', 'gtm_enqueue_styles', 20 );


/**
 * Setup Child Theme Palettes
 *
 * @param string $palettes registered palette json.
 * @return string
 */
function gtm_change_palette_defaults( $palettes ) {
	$palettes = '{"palette":[{"color":"#2B6CB0","slug":"palette1","name":"Palette Color 1"},{"color":"#215387","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"second-palette":[{"color":"#2B6CB0","slug":"palette1","name":"Palette Color 1"},{"color":"#215387","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"third-palette":[{"color":"#2B6CB0","slug":"palette1","name":"Palette Color 1"},{"color":"#215387","slug":"palette2","name":"Palette Color 2"},{"color":"#1A202C","slug":"palette3","name":"Palette Color 3"},{"color":"#2D3748","slug":"palette4","name":"Palette Color 4"},{"color":"#4A5568","slug":"palette5","name":"Palette Color 5"},{"color":"#718096","slug":"palette6","name":"Palette Color 6"},{"color":"#EDF2F7","slug":"palette7","name":"Palette Color 7"},{"color":"#F7FAFC","slug":"palette8","name":"Palette Color 8"},{"color":"#ffffff","slug":"palette9","name":"Palette Color 9"}],"active":"palette"}';
	return $palettes;
}
add_filter( 'kadence_global_palette_defaults', 'gtm_change_palette_defaults', 20 );

/**
 * Setup Child Theme Defaults
 *
 * @param array $defaults registered option defaults with kadence theme.
 * @return array
 */
function gtm_change_option_defaults( $defaults ) {
	$new_defaults = '[]';
	$new_defaults = json_decode( $new_defaults, true );
	return wp_parse_args( $new_defaults, $defaults );
}
add_filter( 'kadence_theme_options_defaults', 'gtm_change_option_defaults', 20 );


add_post_type_support( 'page', 'excerpt' );


/**
 * Ignore irrelevant queries - Facetwp
 */
function ignore_queries_facetwp(){
	if( is_page( array ('business-directory', 'business-directory-search-results') ) ) {

        add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
            if ( 'post' == $query->get( 'post_type' ) ) {
                $is_main_query = false;
            }
            return $is_main_query;
        }, 10, 2 );

	}
}
add_action( 'wp_head', 'ignore_queries_facetwp' );


/**
 * ACF - Register Options Page
 *
 */
function register_redverde_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'title'      => __( 'GuideToMalaga Options', 'gtm' ),
            'capability' => 'manage_options',
        ) );
    }
}
add_action( 'init', 'register_redverde_options_page', 10 );

/**
 * ACF - Register custom blocks
 * 
 */
function gtm_register_acf_blocks() {
    register_block_type( __DIR__ . '/partials/blocks/search-form' );
    register_block_type( __DIR__ . '/partials/blocks/business-by-choice' );
    register_block_type( __DIR__ . '/partials/blocks/directory-categories' );
    register_block_type( __DIR__ . '/partials/blocks/gtm-timeline' );
    register_block_type( __DIR__ . '/partials/blocks/featured-hotel' );
    register_block_type( __DIR__ . '/partials/blocks/triple-featured-hotel' );
}
add_action( 'init', 'gtm_register_acf_blocks', 10 );


/**
 * Add a class to body on Business Directory's taxonomty pages
 * 
 */
function custom_class_for_business_archive_pages( $classes ){
	if ( is_tax( 'business-category' ) ) {
        $classes[] = 'directory-archive';
    }
    return $classes;
}
add_action( 'body_class', 'custom_class_for_business_archive_pages' );