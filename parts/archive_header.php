<?php

/*	Display Archive Header
 *	The archive header displays information that is
 *	relavent to the information within the archive being
 *	displayed.  It helps tell the user where they are.
 */

echo '<div class="archive-header">';

	// Check if archive is for a Category.
if ( is_category() ) {

	?>
		<div class="archive-header-title">
			<h1>Category Archives for: <span class="archive-header-term"><?php single_cat_title( '', true ); ?></span></h1>
		</div>
		<p><?php echo category_description(); ?></p>
		<div class="archive-header-meta clearfix">
			<div>
				<?php global $page; ?>
				<?php echo( get_query_var( 'paged' ) ) ? 'Page ' . get_query_var( 'paged' ) : 'Page ' . 1;  ?>
				<?php echo ' of ' . $wp_query->max_num_pages; ?>
			</div>
			<div>
				<?php $cat_id = get_query_var( 'cat' ); ?>
				<?php $cat_info = get_categories( array('include' => $cat_id) ); ?>
				<?php echo $cat_info[0]->count; ?> Posts Found
			</div>
			<div class="archive-header-exit">
				<a href="<?php echo get_bloginfo( 'url' ); ?>/blog/"><i class="fa fa-sign-out"></i> Exit Archive</a>
			</div>
		</div>
	
    <?php



	// Check if archive is for a Tag.
} else if ( is_tag() ) {

	?>
		<div class="archive-header-title">
			<h1>Posts tagged with: <span class="archive-header-term"><?php single_tag_title( '', true ); ?></span></h1>
		</div>
	
    <?php




	// Check if archive is for a Target Nation.
} else if ( is_tax( 'target_nations_taxo' ) ) {

	?>
	
		<div class="archive-header-title">
			<h1>Target Nation Blog: <span class="archive-header-term"><?php echo single_term_title(); ?></span></h1>
		</div>
		<p>Our blog is a place where students and missionary members alike post frequently about all of the things that are happening here on campus and throughout the world. We post outreach updates, testimonies, devotionals, and encouragements that cover a multitude of themes and subjects. Our desire is that these posts will give you a better idea of what we are doing here at YWAM Montana | Lakeside and that this blog will be an encouragement for you in your walk with Christ.</p> 
		<div class="archive-header-meta clearfix">
			<div>
				<?php

				$queried_object = get_queried_object();
				$target_nation_page = get_posts(
					array(
						'post_type' => 'target_nations',
						'name'    => $queried_object->slug,
					)
				);
				?>
				
				<a href="<?php echo get_permalink( $target_nation_page[0]->ID ); ?>">View Target Nation Page</a>
			</div>
			<div class="archive-header-exit">
				<a href="<?php echo get_bloginfo( 'url' ); ?>/blog/"><i class="fa fa-sign-out"></i> Exit Archive</a>
			</div>
		</div>
	
    <?php


	/**
	 * Display the Program Blog Header
	 * This will display the program blog header which inlcudes
	 * a short description of the school, and other information
	 * about how many posts are present, and a link to exit to
	 * the main blog
	 */


} elseif ( is_tax( 'program_taxo' ) ) {

	// Get Queried Object
	$queried_object = get_queried_object();
	$program_object = get_page_by_path( $queried_object->slug, OBJECT, 'program' );

	?>
	
		<div class="archive-header-title">
			<h1><?php echo single_term_title(); ?></h1>
		</div>
    <?php echo get_excerpt_by_id( $program_object->ID, 60, true, 'View School Page' ) ?>
		<div class="archive-header-meta clearfix">
			<div>
				<?php global $page; ?>
				<?php echo( get_query_var( 'paged' ) ) ? 'Page ' . get_query_var( 'paged' ) : 'Page ' . 1;  ?>
				<?php echo ' of ' . $wp_query->max_num_pages; ?>
			</div>
			<div>
				<?php
				$program_post_num = count( get_posts( "program_taxo={$queried_object->slug}&nopaging=true" ) );
				echo $program_post_num . ' Posts';
				?>
			</div>
			<div class="archive-header-exit">
				<a href="<?php echo get_bloginfo( 'url' ); ?>/blog/"><i class="fa fa-sign-out"></i> Exit Archive</a>
			</div>
		</div>
	
    <?php
    
    
    
    

} elseif ( is_author() ) { ?>

    <?php 
    $author_info = get_coauthors();
    ?>

    <h1>Posts By: <?php echo $author_info[0]->display_name; ?></h1>
    <div class="row">
        <div class="columns medium-9">
            <p><?php echo $author_info[0]->description ?></p>
        </div>
        
        <div class="columns medium-3">
            <?php $attr = array('class' => 'author-archive-img'); ?>
            <?php echo get_the_post_thumbnail($author_info[0]->ID, 'thumbnail', $attr); ?>
        </div>
    </div>

<?php

	// Search Query
} elseif ( is_search() ) {
	echo '<h1>Search Results for: ' . get_search_query() . '</h1>';

	// Last resort, and default header of the archive.
} else {

	?>
		<div class="archive-header-title">
			<h1>Blog</h1>
		</div>
		<p>Our blog is a place where students and staff alike post frequently about all of the things that are happening here on campus and throughout the world. We post outreach updates, testimonies, devotionals, and encouragements that cover a multitude of themes and subjects. Our desire is that these posts will give you a better idea of what we are doing here at YWAM Montana | Lakeside and that this blog will be an encouragement for you in your walk with Christ.</p> 
    <?php
}

echo '</div>';
?>
