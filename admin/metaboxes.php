<?php

//Add Custom Meta Boxes
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'slide_details',
		'title'      => 'Slide Details',
		'pages'      => array( 'slider', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Slide Heading',
				'desc' => 'Heading for the slide (appears on top of caption in block letters).',
				'id'   => $prefix . 'slide_title',
				'type' => 'text',
			),
			array(
				'name' => 'Caption Text',
				'desc' => 'Caption text (appears beneath slide heading).',
				'id'   => $prefix . 'caption_text',
				'type' => 'textarea_small',
			),
			
			array(
				'name' => 'Location Caption',
				'desc' => 'The caption that displays location information for the image.',
				'id'   => $prefix . 'location_info',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Button Heading',
				'desc' => 'Bold text to be displayed at the top of the button.',
				'id'   => $prefix . 'button_heading',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Button Subtext',
				'desc' => 'Text displayed below the button heading (secondary text).',
				'id'   => $prefix . 'button_subtext',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Caption Details',
				'desc' => 'Caption position and display options',
				'id'   => $prefix . 'caption_details',
				'type' => 'title',
			),
			array(
				'name'    => 'Caption Position',
				'desc'    => 'Caption&rsquo;s position within page.',
				'id'      => $prefix . 'caption_position',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Top Left', 'value' => 'top left', ),
					array( 'name' => 'Bottom Left', 'value' => 'bottom left', ),
					array( 'name' => 'Top Right', 'value' => 'top right', ),
					array( 'name' => 'Bottom Right', 'value' => 'bottom right', ),
				),
  		),
			array(
				'name'    => 'Caption Background',
				'desc'    => 'Use background for caption?',
				'id'      => $prefix . 'caption_bg',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Yes', 'value' => 'blktnt', ),
					array( 'name' => 'No', 'value' => 'none', ),
				),
			),
			array(
				'name'    => 'White Text',
				'desc'    => 'Should the text be white for higher Contrast?',
				'id'      => $prefix . 'caption_white',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Yes', 'value' => 'white', ),
					array( 'name' => 'No', 'value' => 'none', ),
				),
			),
			array(
				'name' => 'Button Link Destination',
				'desc' => 'Where will the button link to?',
				'id'   => $prefix . 'button_link',
				'type' => 'text_medium',
			),
		),
	);

  return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
