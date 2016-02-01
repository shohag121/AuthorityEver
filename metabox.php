<?php

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', 'aec_core_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "aec_core" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function aec_core_register_meta_boxes( $meta_boxes )
{
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'aec_core_';

    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'review_meta',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => __( 'Informations', 'aec-core' ),

        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array( 'review_post' ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',

        // Auto save: true, false (default). Optional.
        'autosave'   => true,

        // List of meta fields
        'fields'     => array(
            // ASIN
            array(
                // Field name - Will be used as label
                'name'  => __( 'ASIN', 'aec-core' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}asin",
                // Field description (optional)
                'desc'  => __( 'Input ASIN Number', 'aec-core' ),
                'type'  => 'text',
                // Default value (optional)
                'std'   => __( '', 'aec-core' ),
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => false,
            ),
            // BUTTON
            array(
                'id'   => "{$prefix}button",
                'type' => 'button',
                'name' => ' ', // Empty name will "align" the button to all field inputs
                'std'  => 'Get Data'
            ),
            // List Price
            array(
                // Field name - Will be used as label
                'name'  => __( 'List Price', 'aec-core' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}listprice",
                'type'  => 'text',
                'clone' => false,
            ),
            // List Price
            array(
                // Field name - Will be used as label
                'name'  => __( 'Price', 'aec-core' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}price",
                'type'  => 'text',
                'clone' => false,
            ),
            // Currency Code
            array(
                // Field name - Will be used as label
                'name'  => __( 'Currency Code', 'aec-core' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}currencycode",
                'type'  => 'text',
                'clone' => false,
            ),
            // User Rating
            array(
                'name' => __( 'User Rating', 'aec-core' ),
                'id'   => "{$prefix}userrating",
                'type' => 'number',
                'min'  => 0,
                'max'  => 5,
                'step' => .1,
                'std'  => 0,
            ),
            // Total Reviews
            array(
                'name'  => __( 'Total Reviews', 'aec-core' ),
                'id'    => "{$prefix}totalreview",

                'type'  => 'text',
                'std'   => __( '', 'aec-core' ),
                'clone' => false,
            ),
            // Editor Rating
            array(
                'name' => __( 'Editor Rating', 'aec-core' ),
                'id'   => "{$prefix}editorrating",
                'type' => 'number',
                'min'  => 0,
                'max'  => 5,
                'step' => .1,
                'std'  => 0,
            ),

            // Model
            array(
                // Field name - Will be used as label
                'name'  => __( 'Model', 'aec-core' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}model",
                'type'  => 'text',
                'clone' => false,
            ),
            // PROS
            array(
                'name'    => __( 'Pros', 'aec-core' ),
                'id'      => "{$prefix}pros",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,


                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),

            // Cons
            array(
                'name'    => __( 'Cons', 'aec-core' ),
                'id'      => "{$prefix}cons",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,


                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),

            // verdict
            array(
                'name'    => __( 'Verdict', 'aec-core' ),
                'id'      => "{$prefix}verdict",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,

                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),



        ),

        // End metabox

    );



    return $meta_boxes;
}

