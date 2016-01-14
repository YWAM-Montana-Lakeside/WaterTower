<div class="row surge-single-container">
	<div class="medium-8 columns surge-content-container">
        
        <div class="flex-video widescreen vimeo">
			<iframe src="<?php echo rwmb_meta('surge_video_url'); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
        
		<?php the_content(); ?>
		<div class="surge-goals-container">
			<ul class="small-block-grid-3 surge-goal-charts-container">
				
				<li>
					<i class="flaticon-jumping28"></i>
					<div class="surge-goal-chart-container">
						<canvas id="discipled" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">500</div>
							<div class="surge-goal-label">Disciples</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
				
				<li>
					<i class="flaticon-church13"></i>
					<div class="surge-goal-chart-container">
						<canvas id="church-partnerships" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">50</div>
							<div class="surge-goal-label">Partnerships</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
				
				<li>
					<i class="flaticon-running31"></i>
					<div class="surge-goal-chart-container">
						<canvas id="missionaries-sent" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">50</div>
							<div class="surge-goal-label">Sent</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
                
                
                <?php
                //Define all parameters for goals
                $disciples = rwmb_meta('500_disciples_progress');
                $disciples_needed = 500 - $disciples;

                $church_partnerships = rwmb_meta( '50_church_partnerships_progress' );
                $church_partnerships_needed = 50 - $church_partnerships;

                $missionaries_sent = rwmb_meta( '50_missionaries_sent_progress' );
                $missionaries_sent_needed = 50 - $missionaries_sent;

                ?>  
                
				<script>
					
					var options = {
									animation: false,
									segmentStrokeColor : "transparent",
									percentageInnerCutout : 85,
									responsive: true,
									showTooltips: false,
								}
					
					// Disciples Data
					var discipledData = [
						{ value: 60, color: "transparent", },
					    { value: <?php echo $disciples; ?>, color:"#5D9ECB", highlight: "#FF5A5E", label: "Disciples" },
					    { value: <?php echo $disciples_needed; ?>, color: "#EFEFEF", },
					    { value: 60, color: "transparent", }, ]
					var discipled = $("#discipled").get(0).getContext("2d");
					var discipledChart = new Chart(discipled).Doughnut(discipledData, options);
					
					// Church Parterships Data
					var churchPartnershipsData = [
						{ value: 6, color: "transparent", },
					    { value: <?php echo $church_partnerships; ?>, color:"#5D9ECB", highlight: "#FF5A5E", label: "Church Partnerships" },
					    { value: <?php echo $church_partnerships_needed; ?>, color: "#EFEFEF", },
					    { value: 6, color: "transparent", }, ]
					var churchPartnerships = $("#church-partnerships").get(0).getContext("2d");
					var churchPartnershipsChart = new Chart(churchPartnerships).Doughnut(churchPartnershipsData, options);
					
					// Missionaries Sent Data
					var missionariesSentData = [
						{ value: 6, color: "transparent", },
					    { value: <?php echo $missionaries_sent; ?>, color:"#5D9ECB", highlight: "#FF5A5E", label: "Missionaries Sent" },
					    { value: <?php echo $missionaries_sent_needed; ?>, color: "#EFEFEF", },
					    { value: 6, color: "transparent", },
					]
					var missionariesSent = $("#missionaries-sent").get(0).getContext("2d");
					var missionariesSentChart = new Chart(missionariesSent).Doughnut(missionariesSentData, options);
				</script>
				
			</ul>
			
			<div class="surge-goal-metrics">
				<div class="surge-goal-desc">
					<h4><i class="flaticon-jumping28"></i> 500 Disciples Made</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<?php echo rwmb_meta( '500_disciples' ); ?>

				</div>
				<div class="surge-goal-desc">
					<h4><i class="flaticon-church13"></i> 50 Church Partnerships</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<?php echo rwmb_meta( '50_church_partnerships' ); ?>
                    
				</div>
				<div class="surge-goal-desc">
					<h4><i class="flaticon-running31"></i> 50 Missionaries Sent</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<?php echo rwmb_meta( '50_sent' ); ?>
                    
				</div>
				
			</div>
		</div>
		
        <?php if (rwmb_meta( 'target_locations_description' ) != '') { ?>
            <h2>Target Locations</h2>
            <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/images/map_website-05.jpg" style="float: right; width: 45%; padding-left: 30px; padding-bottom: 30px;" />
            <?php echo rwmb_meta( 'target_locations_description'); ?>
        <?php } ?>
		
		
        <?php
        
        // Display Surge Impact Title
        echo '<h2>Impact of The Surge: ' . rwmb_meta('surge_country') . '</h2>';

        // Display Surge Impact Description
        echo rwmb_meta( 'surge_impact' );

        // Display Surge Impact Author
        $terms = rwmb_meta( 'impact_author', 'type=select&multiple=1' );

        if ( ! empty($terms) ) {
            echo '<div data-magellan-destination="school-leaders" class="authors-container">';
            foreach ( $terms as $term ) {
                $author_object = get_post( $term, OBJECT );
                $leader_ids[] = $author_object->ID;
            }
            display_authors( $program_id, $leader_ids );
            echo '</div>';
        }

        ?>
    
    
        <ul class="medium-block-grid-3 surge-instagram-feed">
            <h2>Instagram Feed<span><a href="#_">#surgetaiwan</a></span></h2>
			
            <?php // Display all of the posts

            $instagram_posts = instagram_object('surgetaiwan');
            $instagram_posts = array_slice($instagram_posts, 0, 6);
            foreach ( $instagram_posts as $instagram_post ) { ?>

                <li class="surge-instagram-post">
                    <a href="<?php echo $instagram_post['data']['link']; ?>">
                    <div class="instagram-image-container clearfix">
                        <div class="instagram-img">
                            <?php echo '<img src="' . $instagram_post['images']['standard_resolution']['url'] . '" />'; ?>
                        </div>

                        <div class="instagram-meta">
                            <div class="instagram-date"><?php echo date('M d', $instagram_post['created_time']); ?></div>

                            <div class="instagram-likes">
                                <i class="fa fa-heart-o"></i><?php echo($instagram_post['likes']['count']); ?>
                            </div>

                            <div class="instagram-comments">
                                <i class="fa fa-comments-o"></i><?php echo($instagram_post['comments']['count']); ?>
                            </div>
                        </div>
                    </div>
                    </a>
                </li>

            <?php } ?>
		</ul>
		
	</div>
	

	<aside id="sidebar" class="medium-4 columns stick-to-parent">
		<?php get_template_part('parts/surge_snapshot_timeline'); ?>
	</aside>
</div>