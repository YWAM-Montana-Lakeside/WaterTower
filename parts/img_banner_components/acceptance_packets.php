<?php

/**
 *  Archive Headers
 *  These are all of the custom headers for archive pages.
 */
global $page_id;
$post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full-width-banner', true ); ?>

 <div class="standard-banner-container slide-container" style="background: url(<?php echo $post_thumbanail[0]; ?>) no-repeat center center;">
  <div class="row vertical-align-relative">
   <div class="small-12 columns slide-content-container" style="text-align: center;">
    <h2 class="fittext shadow">Congratulations!</h2>
    <h2 class="fittext">Congratulations!</h2>
    <div class="subtitle">You've Been Accepted To <?php echo get_the_title(); ?></div>
   </div>
  </div>
 </div>