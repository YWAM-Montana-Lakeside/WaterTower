<?php

/*	Page Custom Meta
 *	This is where we define all of the custom
 * 	meta fields for the Pages.
 */

$meta_boxes[] = array(
	'title'  => 'Page Settings',
	'pages' => array( 'page'),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(

		// RADIO BUTTONS
		array(
			'name'    => __( 'Page Sidebar', 'meta-box' ),
			'id'      => "{$prefix}page_sidebar",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'widgetized' => __( 'Widgetized', 'meta-box' ),
				'headings' => __( 'Heading Menu', 'meta-box' ),
			),
			'std' => 'headings',
		),
	),
);

$meta_boxes[] = array(
	'title'  => 'Ask a Question Form',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
        
        //Sidebar Form
		array(
			'name'	=> 'Sidebar Question Shortcode',
			'id'	=> "{$prefix}application_question_form_shortcode",
			'type'	=> 'text',
		),
		
	),

	'only_on'    => array(
		//'id'       => array(),
		'template' => array( 'page-application.php' ),
		//'parent'   => array()
	),
);

?>