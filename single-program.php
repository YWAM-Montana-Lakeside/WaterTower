<?php

/*
 * Program Single Template
 * 
 * This template is served up anytime a program page
 * is called to be displayed.
 */
 
 get_header();
 
 ?>
 
 
 <div class="row">
 	<div class="large-9 columns single-program-content-container">
 		<?php while (have_posts()) : the_post(); ?>
 			
 			<?php
 			
 			/**
			 * Populate the $program_id variable to pass to
			 * any functions that require it to function.
			 */
			
			$program_id = $post->ID;
			$program_object = new programInfo($program_id);
			 
			?>
 			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action('foundationPress_program_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile;?>
		
		<div class="row">
			<div class="medium-12 columns">
			<?php echo do_shortcode('[vimeography id="1"]'); ?>
			</div>
		</div>
		
		
		<?php
		/**
		 * Program Info Section
		 * This is a section that displays general information
		 * about the program, such as how long the program lasts,
		 * if there is an outreach how long it is, and the 
		 * accreditation information.
		 */
		 ?>
		 
		 <div class="row program-info-container">
		 	<div class="medium-3 columns program-info-duration-container">
		 		<div class="program-info-duration-number"><?php echo $program_object->academic_info['program_duration']; ?></div>
		 		<div class="program-info-duration-desc">Weeks Total</div>
		 	</div>
		 	<div class="medium-9 columns program-info-academic-container">
		 		<h5>Accreditation <i class="fa fa-graduation-cap"></i></h5>
		 		<?php echo $program_object->academic_info['accreditation']; ?>
		 	</div>
		 </div>
		
		
		
		<?php
		/**
		 *	Program Schedule Section
		 * 	This is the section where all of the dates for
		 * 	upcoming programs are displayed along with links to
		 * 	apply for each of the scheduled schools. 
		 */

		echo '<ul class="small-block-grid-1 medium-block-grid-3 program-dates-container">';
			if (!empty($program_object->schedule)) {
					
				// Dispaly available program instaces	
				foreach ($program_object->schedule as $program_occurance) {
					echo '<li><div class="program-date-info-container">';
					echo '<h4>' . $program_occurance['quarter'] . '</h4>';
						echo '<ul>';
						
							$program_info_string = '<li>%s:<span class="right">%s</span></li>';
							
							echo sprintf($program_info_string, 'Start Date', date('m/d/y', strtotime($program_occurance['start_date'])));
							echo sprintf($program_info_string, 'End Date', date('m/d/y', strtotime($program_occurance['end_date'])));
							echo sprintf($program_info_string, 'Total Cost', $program_occurance['total_cost']);
							echo sprintf($program_info_string, 'Apps Due', date('m/d/y', strtotime($program_occurance['app_deadline'])));
						echo '</ul>';
						echo '<a href="#_" class="button">Apply Online</a>';
					echo '</div></li>';
					}
				
			} else {
				echo "Sorry there aren't any available dates at this time.";
			}
		echo '</ul>';
		
		// Display some of the academic and application requirements ?>
		<div class="row program-prereqs-container alert-box warning">
			<div class="small-3 medium-2 columns program-prereqs-icon-container">
				<i class="fa fa-check-square-o"></i>
			</div>
			<div class="small-9 medium-10 columns">
				<div class="program-pre-reqs">
					<h5>Pre-Requisites</h5>
					<?php echo $program_object->academic_info['recommended_prereqs']; ?>
				</div>
			</div>
		</div>
		
		
		
		<?php 
		/**
		 * Video Section
		 * This is the section of each school page where we pull in
		 * any videos that may lend themselves to the school.
		 */
		
		
		
		?>
		
		
		
		
		
		
		
		<div class="program-onbase-phase-info-container">
			
			<?php // OnBase phase description ?>
			<div class="program-onbase-phase-desc">
				<h2><?php echo rwmb_meta('lecture_phase_title'); ?></h2>
				<p><?php echo rwmb_meta('lecture_phase_desc'); ?></p>
			</div>
			
			
			<?php // On Base Phase Details ?>
			<div class="onbase-phase-detail-container">
															
				<div class="onbase-phase-details">
					<?php $n = 1; ?>
					<?php $activity_title = 'activity_title' . $n; ?>
					<?php $activity_hours = 'hours_per_week' . $n; ?>
					<?php $activity_desc = 'activity_description' . $n; ?>
										
					
					
					<?php 
					
					/*	Function find_total_hours()
					 *
					 *	This function finds the total amount of hours
					 *	per week for whichever particular program is
					 *	being displayed.
					 *
					 *	@input string $title
					 *	@output string $total_hours
					 */
					 
					function find_total_hours($title) {
						
						while (rwmb_meta($title) !== '') {
							$j = $j + 1;
							$title = 'activity_title' . $j;
							$activity_hours = 'hours_per_week' . $j;
							$total_hours = $total_hours + rwmb_meta($activity_hours);
							
						}
						return $total_hours;
					} 
					
					$total_hours = find_total_hours($activity_title); 
					
					?>
					
					
				
					<?php while (rwmb_meta($activity_title) !== '') { ?>
					<div class="onbase-phase-activity-details-container row">
						
						<div class="small-12 columns">
							<h4>
								<?php echo rwmb_meta($activity_title); ?>
								<span class="right show-for-medium-up onbase-phase-activity-hours"><?php echo rwmb_meta($activity_hours); ?> Hours/Week</span>
							</h4>
							<span class="show-for-small-only onbase-phase-activity-hours"><?php echo rwmb_meta($activity_hours); ?> Hours/Week</span>
						</div>
						
						<div class="small-12 medium-10 columns">
							<?php echo rwmb_meta($activity_desc); ?>
							
						</div>
					
					
						<div class="hide-for-small medium-2 columns onbase-phase-activity-detail-chart">
							<div class="chart-container">
								<i class="fa fa-caret-down"></i>
								<canvas id="activity-detail-<?php echo $n; ?>" class="chart" width="150" height="150"></canvas>
								
								<script>
									jQuery(document).ready(function($) {
									
									var onbaseOverview = [
									
									
									//LOOP THROUGH TOTAL CHART DATA
									<?php $i = 1; ?>
									<?php $activity_title = 'activity_title' . $i; ?>
									<?php $activity_hours = 'hours_per_week' . $i; ?>
									<?php $activity_desc = 'activity_description' . $i; ?>
									<?php $hours_before = 0; ?>
									<?php $hours_after = $total_hours - rwmb_meta($activity_hours); ?>
	
									<?php while (rwmb_meta($activity_title) !== '') { ?>
	
											<?php if ($n == $i) { ?>
												{value : <?php echo $hours_before; ?>, color : "#EFEFEF"},
												{value : <?php echo rwmb_meta($activity_hours); ?>, color : "#609FCE" },
												{value : <?php echo $hours_after; ?>, color : "#EFEFEF"},
											<?php } ?>
											
										<?php $hours_before = $hours_before + rwmb_meta($activity_hours); ?>
										
											
										<?php $i = $i + 1; ?>
										<?php $activity_title = 'activity_title' . $i; ?>
										<?php $activity_hours = 'hours_per_week' . $i; ?>
										<?php $activity_desc = 'activity_description' . $i; ?>
										<?php $hours_after = $total_hours - (rwmb_meta($activity_hours)+$hours_before); ?>
										
									<?php } ?>
									
										]
									var options = {
										segmentStrokeWidth : 2,
										percentageInnerCutout : 65,
										animation: false,
										responsive: true,
									}
									var ctx = document.getElementById("activity-detail-<?php echo $n; ?>").getContext("2d");
									var myNewChart = new Chart(ctx).Doughnut(onbaseOverview, options);
										
											
									});			
								</script>
								
							</div>
						</div>
					
					</div><!--/.onbase-phase-detail-container-->
					
					<?php $n = $n + 1; ?>
					<?php $activity_title = 'activity_title' . $n; ?>
					<?php $activity_hours = 'hours_per_week' . $n; ?>
					<?php $activity_desc = 'activity_description' . $n; ?>
					<?php } ?>
					
				</div>
			</div>
		</div>
		
		
		
		
		
		
 	</div>
 	
 	<div class="large-3 columns">
 		<div class="magellan-container" data-magellan-expedition="fixed">
		  <dl class="sub-nav side-nav-container">
		    <dd data-magellan-arrival="build"><a href="#build">Build with HTML</a></dd>
		    <dd data-magellan-arrival="js"><a href="#js">Arrival 2</a></dd>
		  </dl>
		</div>
 	</div>
 	
 </div>
 
 
 
<?php
 
get_footer();
 
?>
