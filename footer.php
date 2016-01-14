</section>

<?php if ( ! is_front_page() ) : ?>
<div class="breadcrumbs-container">
	<div class="row">
		<div class="medium-12 columns">
    <?php if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
} ?>
		</div>
	</div>
</div>
<?php
endif; ?>



<?php do_action( 'watertower_before_footer' ); ?>
<footer id="contact" class="footer">
	<div class="row">
		
		<div class="medium-4 large-3 columns find-us-container">
			<h2>Find Us</h2>
			
			<div class="find-us-phone"><i class="fa fa-mobile"></i>(406) - 844 - 2221</div>
			
			<div class="find-us-email">info@ywammontana.org</div>
			
			<div class="find-us-organization">YWAM Montana | Lakeside</div>
			<div class="find-us-address-container">
				<div>501 Blacktail Rd.</div>
				<div>Lakeside MT, 59922</div>
				<div>United States</div>
			</div>
			
			<div class="find-us-tour"><a href="<?php echo get_permalink( get_page_by_path( 'campus-tour' )->ID ); ?>"><i class="fa fa-street-view"></i>Campus Tour</a></div>
			
			<h5>Social Networks</h5>
			<div class="find-us-social">
				<ul>
					<li><a href="<?php echo of_get_option( 'instagram_url' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
					<li><a href="<?php echo of_get_option( 'facebook_url' ); ?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
					<li><a href="<?php echo of_get_option( 'vimeo_url' ); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
					<li><a href="<?php echo of_get_option( 'twitter_url' ); ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="<?php echo of_get_option( 'pinterest_url' ); ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
				</ul>
			</div>
		</div>
		
		<div class="medium-4 large-5 columns contact-us-container">
			<h2>Contact Us</h2>
    <?php echo do_shortcode( of_get_option( 'footer_contact_form' ) ); ?>
		</div>
		
		<div class="medium-4 large-4 columns get-involved-container">
			
    <?php
	// Query Staffing Needs
	$staffing_needs = get_posts( 'post_type=staffing_needs' );

	foreach ( $staffing_needs as $staffing_need ) {
		$need_url = get_permalink( $staffing_need->ID );
		$staffing_needs_list = "<strong><a href='{$need_url}'>{$staffing_need->post_title}</a></strong>";
		$staffing_needs_list .= end( $staffing_needs ) != $staffing_need ? ', ' : '.';
	}

	?>
			
			<h2>Get Involved</h2>
			<p class="get-involved-staffing-needs">We are currently looking for full-time volunteers to fill these staff positions: <?php echo $staffing_needs_list; ?></p>
    <?php watertower_get_involved(); ?>
		</div>
	
	</div>
</footer>
<?php do_action( 'watertower_after_footer' ); ?>

<a class="exit-off-canvas"></a>

    <?php do_action( 'watertower_layout_end' ); ?>
	</div>
</div>

<div class="footer-copyright">
	<div class="copyright-bar-links row">
		<div class="medium-12 columns">
			<ul>
				<li><a href="https://ywammontana.org">&copy; 2015, YWAM Montana | Lakeside</a></li>
				<li><a href="http://ywam.org">Youth With A Mission</a></li>
				<li><a href="#_" class="get-crazy-button">A Big Red Button</a></li>
			</ul>
		</div>
	</div>
</div>


<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
    /*
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?36NGmoT0awHc6akseNLUaHnYhTOLopEN";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
 */
</script>
<!--End of Zopim Live Chat Script-->
<!-- <a href="#" class="chat-button activate-zopim"><i class="fa fa-comments-o"></i> Chat With Us</a> -->


<?php wp_footer(); ?>
<?php do_action( 'watertower_before_closing_body' ); ?>
</body>
</html>