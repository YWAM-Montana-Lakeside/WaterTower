<?php

/**
 * Image Banner
 *
 * This chunk of code is one of the last functions to be called upon in the
 * header file. It checks whether or not the page being display is the front
 * page or the home page and displays the latest posts if so. Otherwise it
 * will display a featured image if one exists for the post or page.
 */

// Display Front Page Header
if ( is_front_page() ) {
    include_once('img_banner_components/front_page.php');

// Display Featured Video
} elseif (rwmb_meta( 'enable_featured_video' ) && !is_archive() ) {
    include_once('img_banner_components/featured_video.php');
    
// Campus Tour Interactive Tour    
} elseif ( is_page( 'campus-tour' ) ) {
    include_once('img_banner_components/campus_tour.php');

//  Annual Report Header
} elseif ( is_page( 'annual-reports' ) ) {
    include_once('img_banner_components/annual_reports.php');

// Surges & Single Surge Header
} elseif ('surges' == get_post_type() && is_singular('surges') ) {
    include_once('img_banner_components/surges.php');
    
// Display Banner for Acceptance Packets
} elseif ( 'acceptance_packets' == get_post_type()) {
    include_once('img_banner_components/acceptance_packets.php');
        

} else {

	/*  Standard Banner
    *	This bit of code pulls in the featured image of the
    *   post or page either currently on or provided and
    *   simply displays it.  There is no native slider
    *	functionality built into this function
    */

	// Check to see if $page_id variable is set, if so use current setting
	global $page_id;
	$page_id = 0 != $page_id ? $page_id : null;
    
    //Deal with Blog, Category, and Tag Archives
	if ( is_archive() || is_home() || null != $page_id ) {
        include_once('img_banner_components/archive_headers.php');
		
    // Display Image Banner As Usual
	} else {

		if ( has_post_thumbnail( $post->ID ) ) {
			$post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-banner', true );

            // Display Image Banner As Usual
			 echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
            
		}
	}
}

?>