<?php

/**
 *    Program Archive Page Template
 *    This page template displays all of the programs
 *     we offer.
 * 
 *    Template Name: Target Nations
 */
 
//	Get Page ID from the slug
$page_id = get_id_by_slug('target-nations');

get_header();
?>

<div class="row target-nations-archive-container">
	<div class="large-9 columns entry">
		
		<h1><?php echo get_the_title($page_id); ?></h1>
    <?php echo apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
		
    <?php
    $the_query = new WP_Query('post_type=target_nations');
        
    // Loop through Target Nations
    if ($the_query->have_posts() ) {
        echo '<ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-3 target-nations-archive-preview">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>';
            echo '<a href="#' . $post->post_name . '">';
            the_post_thumbnail('thumbnail-card');
            echo '<h4 class="fittext">' . get_the_title() . '</h4>';
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    wp_reset_postdata();    
    ?>
		
		<div class="target-nations-archive-surge-preview" data-magellan-destination="the-surge">
			<div class="row">
				<div class="medium-4 columns">
					<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/images/surge_logo.png" />
					<a href="<?php echo get_permalink(get_id_by_slug('the-surge')); ?>" class="button show-for-medium-up">More Info</a>
				</div>
				<div class="medium-8 columns">
					<h2>The Surge</h2>
					<p>“The Surge” is a laser-like strategy that will partner with one Target Nation for 3-5 years at a time to meet mutually agreed upon, God-given goals.  We may be able to coordinate a Surge in 2-3 different Target Nations at the same time (all at different stages in their Surge timelines) depending on what the goal/strategy is that we are partnering alongside.</p>
					<a href="<?php echo get_permalink(get_id_by_slug('the-surge')); ?>" class="button show-for-small-only">More Info</a>
				</div>
			</div>
		</div>
		
		
    <?php
    $the_query = new WP_Query('post_type=target_nations');
        
    // Loop through Target Nations
    if ($the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
                
            echo '<div class="target-nation-container">';
            $country_id = rwmb_meta('country_id', '', $post->ID);
            $country_info = jp_country_info(strtoupper($country_id));
            $country_name = strtolower($country_info['data'][0]['Ctry']); ?>
				
         <div class="target-nation-header-image-container" data-magellan-destination="<?php echo $post->post_name; ?>">
            <?php
            the_post_thumbnail('full-width-banner');
                    
            echo '<div class="target-nation-header-info vertical-align-absolute">';
            echo '<h2 class="fittext">' . get_the_title() . '</h2>';
            echo '<span class="target-nation-section-percentage">' . number_format($country_info['data'][0]['PercentChristianity'], 2) . '% Christian</span></h2>';
            echo '</div>';
            ?>
         </div>
				
            <?php
                
            //echo '<div class="target-nation-title-wrapper">';
            //echo '<h2 class="target-nation-section-title">' . get_the_title() . '</h2>';
            //echo '<span class="target-nation-section-percentage right">' . number_format($country_info['data'][0]['PercentChristianity'], 2) . '% Christian</span></h2>';
            //echo '</div>';
            ?>
				
				
         <ul class="medium-block-grid-3 target-nation-info">
          <li>
           <i class="fa fa-child target-nation-info-icon"></i>
           <div class="target-nation-info-content-container">
            <div class="target-nation-info-title">Population</div>
            <div class="target-nation-info-content"><?php echo number_format($country_info['data'][0]['Population']); ?></div>
         </div>
        </li>
        <li>
         <i class="fa fa-globe target-nation-info-icon"></i>
         <div class="target-nation-info-content-container">
          <div class="target-nation-info-title">National Religion</div>
          <div class="target-nation-info-content"><?php echo $country_info['data'][0]['ReligionPrimary']; ?></div>
         </div>
        </li>
        <li>
         <i class="fa fa-comments-o target-nation-info-icon"></i>
         <div class="target-nation-info-content-container">
          <div class="target-nation-info-title">Official Language</div>
          <div class="target-nation-info-content"><?php echo $country_info['data'][0]['OfficialLang']; ?></div>
         </div>
        </li>
       </ul>
				
        <?php the_content(); ?>
				
       <ul class="target-nation-footer">
        <li><a href="<?php echo get_bloginfo('url'); ?>/target-nation-blogs/<?php echo $country_name ?>"><i class="fa fa-sitemap"></i> Posts Related to <?php echo ucfirst($country_name); ?> (<?php echo count(get_posts("target_nations_taxo={$country_name}")) ?>)</a></li>
        <li><a href="http://joshuaproject.net/countries/<?php echo $country_id; ?>"><i class="fa fa-external-link"></i> Joshua Project</a></li>
       </ul>
        </div>
        <?php 
        }
    } else {
        // no posts found
    }
    wp_reset_postdata();    
    ?>
		
	</div>
	
	<div class="large-3 columns stick-to-parent-side-nav">
 		<div class="magellan-container" data-magellan-expedition>
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
 	</div>
</div>


<?php get_footer(); ?>
