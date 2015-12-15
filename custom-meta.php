<?php

$prefix = '';
global $meta_boxes;

$meta_boxes = array();

    // require 'library/custom_meta/programs_meta.php';
	require 'library/custom_meta/projects_meta.php';
	require 'library/custom_meta/staffing_needs_meta.php';
	require 'library/custom_meta/focus_tracks_meta.php';
	require 'library/custom_meta/acceptance_packets_meta.php';
	require 'library/custom_meta/campus_tour_meta.php';
	require 'library/custom_meta/front_page_meta.php';
	require 'library/custom_meta/annual_reports_meta.php';
	require 'library/custom_meta/page_meta.php';
    require 'library/custom_meta/featured_video_meta.php';
    require 'library/custom_meta/about_meta.php';
    require 'library/custom_meta/missions_preview_meta.php';
    require 'library/custom_meta/testimony_meta.php';
	
	// Surge Meta
	require 'library/custom_meta/surge_single_meta/global_surge_meta.php';
    require 'library/custom_meta/surge_single_meta/taiwan_2014_2018_meta.php';

$meta_boxes[] = array(
	'title'  => 'Featured Program',
	'pages' => array( 'post'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		//Enable Featured Program
		array(
			'name' => 'Enable Featured Program',
			'id'   => "{$prefix}enable_featured_program",
			'type' => 'checkbox',
			'std'  => 0,
		),

		// Program Select
		array(
			'name'        => __( 'Posts (Pages)', 'meta-box' ),
			'id'          => "{$prefix}featured_program_id",
			'type'        => 'post',
			'post_type'   => 'program',
			'field_type'  => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'meta-box' ),
		),
	),
);



$meta_boxes[] = array(
	'title'  => 'Profile Options',
	'pages' => array( 'guest-author'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(


		//PERSONEL STATUS
		array(
			'name'    => 'Personnel Status',
			'id'    => "{$prefix}status",
			'type'    => 'select',
			'options' => array(
				'student' 	 => 'Student',
				'staff'      => 'Staff',
			),
		),

		//PROFILE STATUS
		array(
			'name' => 'Profile Status',
			'id'   => "{$prefix}profile_status",
			'type' => 'select',
			'options'  => array(
				'public'    => 'Public',
				'private'    => 'private',
			),
			'desc'    => 'Setting a users profile to private will make it so that absolute none of their information is passed through the public side of the web site.  Posts, and teachings can still be assigned, but they will not be attributed to the author in the front end until their profile is set back to public.',
		),

	),

);






$meta_boxes[] = array(
	'title'  => 'Additional Facts',
	'pages' => array( 'guest-author'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		array(
			'name'  => 'Hometown',
			'id'    => "{$prefix}hometown",
			'desc'  => 'Put the users hometown, or country of origin.',
			'type'  => 'text',
			'std'   => '',
			'cloneable' => false,
		),

	),

);





$meta_boxes[] = array(
	'title'  => 'Family Information',
	'pages' => array( 'guest-author'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		//IS MARRIED
		array(
			'name' => 'Married',
			'id'   => "{$prefix}has_spouse",
			'type' => 'checkbox',
			'std'  => 0,
		),

		//GUEST AUTHOR SPOUSE
		array(
			'name'    => __( 'Spouse', 'rwmb' ),
			'id'      => "{$prefix}spouse",
			'type'    => 'post',

			// Post type
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'std'        => '',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),

		//HEAD OF HOUSEHOLD
		array(
			'name' => 'Head of the Household',
			'id'   => "{$prefix}head_household",
			'type' => 'checkbox',
			'std'  => 0,
		),

	),

);








// Target Nations Archive Page
$meta_boxes[] = array(
	'title'  => 'Additional Information',
	'pages' => array( 'target_nations' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		//PHOTO CREDITS
		array(
			'name'  => 'Country ID',
			'id'    => "{$prefix}country_id",
			'desc'  => 'Enter the country ID of the country represented.',
			'type'  => 'text',
			'std'   => '',
		),

	),

);










//Video Gallery Options
$meta_boxes[] = array(
	'title'  => 'Video Gallery Options',
	'pages' => array( 'program', 'projects' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		//VIDEO GALLERY SHORT-CODE
		array(
			'name'  => 'Video Gallery Short-Code',
			'id'    => "{$prefix}video_shortcode",
			'desc'  => 'Insert the short code for the video gallery given from within the Vimeography plugin. Once this is set, it should not have to be set again.  All edits to the gallery can be performed from within the plugin. The short-code should look something like this: [vimeography id="9999999"]',
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),
	),
);




//PROGRAM (SCHOOLS) CUSTOM POST TYPE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Program Information',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'  => 'Short Name',
			'id'    => "{$prefix}short_name",
			'desc'  => 'If your program has an unusually long name, it may interfere with some of the design elements of the website.  We highly recommend assigning a shorterned version of the name here to use in sections where the forementioned example takes place.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),

		array(
			'name'  => 'Program Acronym',
			'id'    => "{$prefix}acronym",
			'desc'  => 'Insert the program acronym.  For example Discipleship Training School would be DTS.  However, not all schools have an acronym that is directly derived from the first letter in each of the words of the school name, so make sure you have the acronym given by the school leader.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),

		array(
			'name'  => 'Program Duration (Weeks)',
			'id'    => "{$prefix}program_duration",
			'desc'  => 'Enter the program duration.',
			'type'  => 'number',
			'std'   => '',
		),


		// SCHOOL LEADERS

		array(
			'name'    => __( 'School Leaders', 'rwmb' ),
			'id'      => "{$prefix}leaders",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'    => true,
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',

		),

		array(
			'name'  => __( 'Prerequisites', 'rwmb' ),
			'id'    => "{$prefix}custom_prereqs",
			'desc'  => 'Please enter any recomended prerequisites needed to apply for this school here.',
			'type'  => 'wysiwyg',
			'std'   => '',
			'clone' => false,
		),



		//ACCREDITATION
		array(
			'name'  => 'Accreditiation',
			'id'    => "{$prefix}accreditation",
			'desc'  => '',
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),




		//FILE ATTACHEMENTS
		array(
			'name' => 'Resource Documents',
			'id'   => "{$prefix}file",
			'type' => 'file_advanced',
			'desc' => 'Use this section to upload documents that may provide extra information about your program that may not be necessary to put on the main page of the program',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

	),

);



$meta_boxes[] = array(
	'title'  => 'Program Dates/Cost',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(


		array(
			'name' => 'Rolling Enrollment Status',
			'id'   => $prefix . 'rolling_enrollment_status',
			'type' => 'checkbox',
			'desc' => 'If the school or program has an ongoing status, meaning that the school does not have specific dates or times, but is always open for students willing to come, check this box',
		),

		array(
			'name' => 'Rolling Enrollment Desc',
			'id'   => $prefix . 'rolling_enrollment_desc',
			'type' => 'wysiwyg',
			'desc' => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		// OFFERED VIA CORRESPONDENCE
		array(
			'name' => 'Offered Via Correspondence',
			'id'   => $prefix . 'via_correspondence',
			'type' => 'checkbox',
			'desc' => 'If the school is offered via correspondence check this box.',
		),

		array(
			'name' => 'Via Correspondence Description',
			'id'   => $prefix . 'via_correspondence_desc',
			'type' => 'wysiwyg',
			'desc' => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),






		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),



		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),

		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost1",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),












		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),



		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),

		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost2",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),











		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),



		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),

		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost3",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
	),
);



// LECTURE PHASE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Lecture Phase',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name' => 'Enable Weekly Schedule Section',
			'id'   => "{$prefix}enable_weekly_schedule_section",
			'type' => 'checkbox',
			'std'  => 1,
		),

		array(
			'name' => 'Lecture Phase Description',
			'id'   => "{$prefix}lecture_phase_desc",
			'desc' => 'Describe lecture phase as a whole in this section.',
			'type' => 'textarea',
			'std'  => '',
		),



		array(
			'name' => 'Has Tracks',
			'id'   => "{$prefix}lecture_has_tracks",
			'desc' => 'If this school has tracks, check the box above.',
			'type' => 'checkbox',
			'std'  => 0,
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),



		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 1</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title1",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week1",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description1",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 2</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title2",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week2",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description2",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 3</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title3",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week3",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description3",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 4</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title4",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week4",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description4",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 5</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title5",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week5",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description5",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 6</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title6",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week6",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description6",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 7</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title7",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week7",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description7",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 8</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title8",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week8",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description8",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 9</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title9",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week9",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description9",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 10</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title10",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),

		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week10",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description10",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after' => '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),



	),
);

// OUTREACH PHASE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Outreach Phase',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name' => 'Has Outreach',
			'id'   => "{$prefix}has_outreach_phase",
			'desc' => 'Check this box if this school has an outreach phase.',
			'type' => 'select',
			'options' => array(
				'no'    => 'No',
				'yes'    => 'Yes',
			),
		),

		array(
			'name' => 'Description',
			'id'   => "{$prefix}outreach_phase_desc",
			'desc' => 'Enter a description for the outreach phase of the school',
			'type' => 'wysiwyg',
			'std'  => '',
		),
	)
);





// EMMAUS ENCOUNTER
$meta_boxes[] = array(
	'title'  => 'Emmaus Encounter Options',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'    => __( 'Debriefing Team', 'rwmb' ),
			'id'      => "{$prefix}debriefing_team",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'    => true,
		),
	),
	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'emmaus-encounter.php' ),
		'parent'   => array()
	),
);



// ANNUAL REPORTS
$meta_boxes[] = array(
	'title'  => 'Annual Report Information',
	'pages' => array( 'annual_report' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'  => 'Annual Report Embed Code',
			'id'    => "{$prefix}annual_report_embed_code",
			'desc'  => 'Enter the embed code provided for the annual report.',
			'type'  => 'textarea',
			'std'   => '',
		),
	),
);




$meta_boxes[] = array(
	'title'  => 'Call To Action Section',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
				'name' => 'Enable Call to Action Section',
				'id'   => "{$prefix}enable_cta",
				'type' => 'checkbox',
				'desc' => 'Check this box to enable the call to action section.',
		),

		array(
				'name' => 'Call To Action Title',
				'id'   => "{$prefix}cta_title",
				'type' => 'text',
				'desc' => 'Put the Title for the call to action section here.',
		),

		array(
				'name' => 'Call To Action Description',
				'id'   => "{$prefix}cta_description",
				'type' => 'textarea',
				'desc' => 'Put the description for the call to action section here.',
		),

		array(
				'name' => 'Call To Action Link URL',
				'id'   => "{$prefix}cta_link_url",
				'type' => 'text',
				'desc' => 'Put the link url for the call to action button here.  This will be the page that the user gets redirected to upon clicking the button.',
		),

		array(
				'name' => 'Call To Action Button Text',
				'id'   => "{$prefix}cta_button_text",
				'type' => 'text',
				'desc' => 'Put the text here that you would like to display on the button.',
		),
	),

	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'front-page.php' ),
		'parent'   => array()
	),
);




//Alumni Page Fields
$meta_boxes[] = array(
	'title'  => 'Additional Information',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
				'name' => 'Enable Alumni Information Form',
				'id'   => "{$prefix}enable_alumni_form",
				'type' => 'checkbox',
				'desc' => 'Check this box to enable the alumni form to be displayed on the page.',
		),

		array(
				'name' => 'Form Shortcode',
				'id'   => "{$prefix}alumni_form_shortcode",
				'type' => 'text',
				'desc' => 'Insert the shortcode given for the particular Gravity Forms form here.',
		),

	),

	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'alumni.php' ),
		'parent'   => array()
	),
);










/**
 * Register meta boxes
 *
 * @return void
 */
function rw_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action( 'admin_init', 'rw_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
    
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}
	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}
	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	}
	else {
		$post_id = false;
	}
	$post_id = (int) $post_id;
	$post = get_post( $post_id );
	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}
		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'category': //post must be saved or published first
				$categories = get_the_category( $post->ID );
				$catslugs = array();
				foreach ( $categories as $category )
				{
					array_push( $catslugs, $category->slug );
				}
				if ( array_intersect( $catslugs, $v ) )
				{
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) )
				{
					return true;
				}
			break;
		}
	}
	// If no condition matched
	return false;
}