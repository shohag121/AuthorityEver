<?php

/*
Plugin Name: AuthorityEver Core
Plugin URI:  https://marketever.com
Description: Core Functionality for AuthorityEver Theme
Version:     0.0.1
Author:      Marketever
Author URI:  http://marketever.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
 * Custom post type include
 * Reviews
 */

add_action( 'init', 'aec_create_posttype' );
function aec_create_posttype()
{
    register_post_type('review_post',
        array(
            'labels' => array(
                'name' => __('Reviews'),
                'singular_name' => __('Review')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'reviews'),
        )
    );
}

/*
 * Include Metabox plugin
 */

require_once("inc/meta-box/meta-box.php") ;
require_once("metabox.php") ;


/*
 * including ajax js to admin
 */

function aec_ajax_helper_enqueue($hook) {

    if ( ('post-new.php' || 'post.php' ) != $hook ) {
        return;
    }
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'aec_ajax_helper_script', plugin_dir_url( __FILE__ ) . 'js/ajax.js',array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'aec_ajax_helper_enqueue' );

/*
 * Settings page
 */

require_once "core-settings.php";
