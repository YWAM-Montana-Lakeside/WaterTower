<?php

/**
 * 	Missions Preview
 * 	This is the custom meta for the Missions Preview page.
 */

$meta_boxes[] = array(
	'title'  => 'Missions Preview Sign-Up Form',
	'pages' => array('page'),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(

		//Sidebar Form
		array(
			'name'	=> 'Sidebar Registration Shortcode',
			'id'	=> "{$prefix}missions_preview_registration_form_shortcode",
			'type'	=> 'text',
		),
        
        //Sidebar Form
		array(
			'name'	=> 'Sidebar Question Shortcode',
			'id'	=> "{$prefix}missions_preview_question_form_shortcode",
			'type'	=> 'text',
		),
        
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'page-missions-preview.php' ),
		'parent'   => array(),
	),
);

$meta_boxes[] = array(
	'title'  => 'Missions Preview Schedule',
	'pages' => array('page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

        //Friday Schedule
        array(
			'name'	=> 'Friday Schedule',
			'id'	=> "{$prefix}missions_preview_friday_schedule",
			'type'	=> 'wysiwyg',
		),
        
		//Saturday Schedule
		array(
			'name'	=> 'Saturday Schedule',
			'id'	=> "{$prefix}missions_preview_saturday_schedule",
			'type'	=> 'wysiwyg',
		),
        
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'page-missions-preview.php' ),
		'parent'   => array(),
	),
);

?>