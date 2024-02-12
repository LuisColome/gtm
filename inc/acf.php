<?php

/**

 * ACF Customizations

 *

 * @package      GTM revamp

 * @author       Bill Erickson

 * @since        1.0.0

 * @license      GPL-2.0+

**/



class BE_ACF_Customizations {



	public function __construct() {



		// Only allow fields to be edited on development

		if ( ! defined( 'WP_LOCAL_DEV' ) || ! WP_LOCAL_DEV ) {

			//add_filter( 'acf/settings/show_admin', '__return_false' );

		}



		// Register options page

		// add_action( 'init', array( $this, 'register_options_page' ) );



		// Register Blocks

		// add_action('acf/init', array( $this, 'register_blocks' ) );

	}



	/**

	 * Register Options Page

	 * 

	 */

	// function register_options_page() {

	//     if ( function_exists( 'acf_add_options_page' ) ) {

	//         acf_add_options_page( array(

	//         	'title'      => __( 'GuideToMalaga Options', 'gtm' ),

	//         	'capability' => 'manage_options',

	//         ) );

	//     }

	// }



	/**

	 * Register Blocks

	 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block

	 *

	 * Categories: common, formatting, layout, widgets, embed

	 * Dashicons: https://developer.wordpress.org/resource/dashicons/

	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/

	 */

	function register_blocks() {



		// if( ! function_exists('acf_register_block_type') )

		// 	return;



        // Register main Search block with a filter by category.

		// acf_register_block_type(array(

		// 	'name'              => 'gtm-block-search',

		// 	'title'             => __('GTM advance Search block'),

		// 	'description'       => __('Advance Search Block for GTM revamp.'),

		// 	'render_template'   => 'partials/blocks/search-form/search-form.php',

		// 	'category'          => 'formatting',

		// 	'icon'              => 'search',

		// 	'keywords'          => array( 'search', 'form', 'advance', 'searching', 'gtm', 'guidetomalaga', 'guide' ),

		// ));



        // Register main Search block with a filter by category.

		// acf_register_block_type(array(

		// 	'name'              => 'gtm-block-business-by-choice',

		// 	'title'             => __('GTM Businesses by Choice'),

		// 	'description'       => __('GTM block to choose what businesses to display.'),

		// 	'render_template'   => 'partials/blocks/business-by-choice/business-by-choice.php',

		// 	'category'          => 'formatting',

		// 	'icon'              => 'building',

		// 	'keywords'          => array( 'business', 'choice', 'advance', 'directory', 'gtm', 'guidetomalaga', 'business' ),

		// ));



        // Register main Search block with a filter by category.

		// acf_register_block_type(array(

		// 	'name'              => 'gtm-block-business-categories',

		// 	'title'             => __('Business categories list'),

		// 	'description'       => __('A list of business categories as grid of buttons.'),

		// 	'render_template'   => 'partials/blocks/directory-categories/directory-categories.php',

		// 	'category'          => 'formatting',

		// 	'icon'              => 'list',

		// 	'keywords'          => array( 'category', 'caetgories', 'directory', 'business', 'gtm', 'guidetomalaga', 'business' ),

		// ));



	}

}

new BE_ACF_Customizations();