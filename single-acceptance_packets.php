<?php

/**
 *    Acceptance Packet Single View
 *
 *     This is the single post view for the acceptance
 *     packets. We have purposefully not allowed the
 *     pages to be archived.
 */

$page_id = rwmb_meta( 'related_program' );

get_header();

?>

<div class="row acceptance-packet-container">
	<div class="medium-9 columns entry">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
		<h1><?php the_title(); ?> Acceptance Packet</h1>
    	<?php the_content(); ?>
        
        
        <div class="ap-mock-schedule-container">
            <?php 
            // Define Daily Variables
            $schedules['Sunday']    = rwmb_meta('ap_sunday_schedule');
            $schedules['Monday']    = rwmb_meta('ap_monday_schedule');
            $schedules['Tuesday']   = rwmb_meta('ap_tuesday_schedule');
            $schedules['Wednesday'] = rwmb_meta('ap_wednesday_schedule');
            $schedules['Thursday']  = rwmb_meta('ap_thursday_schedule');
            $schedules['Friday']    = rwmb_meta('ap_friday_schedule');
            $schedules['Saturday']  = rwmb_meta('ap_saturday_schedule'); ?>
            
            <ul class="medium-block-grid-2">
            <?php
            // Loop through all daily schedules.
            foreach ($schedules as $day => $schedule) {
                
                if (rwmb_meta('ap_enable_' . strtolower($day) . '_schedule')) { ?>
                
                <li>
                    <h3><?php echo $day; ?></h3>
                    <div class="daily-schedule-info">
                        <?php foreach ($schedule as $event) { ?>
                        <div class="schedule-item-wrapper">
                        <div class="row">
                            <div class="columns small-7"><?php echo $event['ap_event_name']; ?></div>
                            <div class="columns small-5" style="text-align: right;"><?php echo $event['ap_event_time']; ?></div>
                        </div>
                        </div>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
            <?php } ?>
            </ul>
        </div>
        
        
        <div>
            <h2>About YWAM</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_about_ywam') ); ?></div>
        </div>
        
        <div>
            <h2>Target Nations</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_target_nations') ); ?></div>
        </div>
        <div>
            <h2>The Surge</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_the_surge') ); ?></div>
        </div>
        <div>
            <h2>Policies And Guidelines</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_policies_and_guidelines') ); ?></div>
        </div>
        <div>
            <h2>Guests</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_guests') ); ?></div>
        </div>
        <div>
            <h2>Campus Services</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_campus_services') ); ?></div>
        </div>
        <div>
            <h2>Getting Here</h2>
            <iframe width='100%' height='300px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/creativemedia.f2a6e20c/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoiY3JlYXRpdmVtZWRpYSIsImEiOiI1MzkzZjJkZjdhZmVmMDFhYzdmYjAzMzRmZDAzZDQ1ZCJ9.pL4m6di5oeOYgjxy0kVrug'></iframe>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_getting_here') ); ?></div>
        </div>
        <div>
            <h2>Guidelines For Contributions</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_guidelines_for_contributions') ); ?></div>
        </div>
        <div>
            <h2>Raising Financial Support</h2>
            <div><?php echo apply_filters( 'the_content', of_get_option('ap_raising_financial_support') ); ?></div>
        </div>
        
			
	  <?php
	endwhile; else : ?>
				<p><?php _e( 'Sorry, we could not find that acceptance packet.' ); ?></p>
	    <?php
	endif; ?>
		
    <?php

	/**
	 *    Leader Section
	 *     This section displays all of the leaders of the
	 *     particular program.
	 */

	$terms = rwmb_meta( 'leaders', 'type=select&multiple=1' );

	if ( ! empty($terms) ) {
		echo '<div data-magellan-destination="school-leaders" class="authors-container program-leaders-container">';
		echo '<h2>Your School Leaders</h2>';
		foreach ( $terms as $term ) {
			$author_object = get_post( $term, OBJECT );
			$leader_ids[] = $author_object->ID;
		}
		display_authors( $program_id, $leader_ids );
		echo '</div>';
	}

	?>
	</div>
	
	<div class="medium-3 columns stick-to-parent-side-nav">
		<div class="magellan-container" data-magellan-expedition>
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
	</div>
</div>

<?php get_footer() ?>
