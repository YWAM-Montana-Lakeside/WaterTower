<?php
/**
 *  Debriefing Custom Meta
 *
 */

$meta_boxes[] = array(
	'title'  => 'Debriefing Page Information',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

        array(
			'name'    => __( 'Debriefers', 'rwmb' ),
			'id'      => "{$prefix}debriefers",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'    => true,
            'after' => '	<hr style="margin: 30px -12px;
                            border-top: 1px solid #CCC;
                            border-bottom: 1px solid #FFF;
                            background-color: transparent;">',
		),
        
        //Sidebar Form
		array(
			'name'	=> 'Sidebar Registration Shortcode',
			'id'	=> "{$prefix}debriefing_registration_form_shortcode",
			'type'	=> 'text',
		),
        
        //Sidebar Form
		array(
			'name'	=> 'Sidebar Question Shortcode',
			'id'	=> "{$prefix}debriefing_question_form_shortcode",
			'type'	=> 'text',
		),
		
	),

	'only_on'    => array(
		//'id'       => array(),
		'template' => array( 'page-debriefing.php' ),
		//'parent'   => array()
	),
);

?>