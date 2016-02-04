<?php

/* Testimonies Custom Post Type
 * The testimonies custom post type contains all of our programs
 * specific data including dates, costs, descriptions etc.
 */

function testimonies_cpt() {
	$labels = array(
		'name'               => _x( 'Testimonies', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Testimony', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'water-tower' ),
		'add_new_item'       => __( 'Add New Testimony', 'water-tower' ),
		'edit_item'          => __( 'Edit Testimony', 'water-tower' ),
		'new_item'           => __( 'New Testimony', 'water-tower' ),
		'all_items'          => __( 'All Testimonies', 'water-tower' ),
		'view_item'          => __( 'View Testimonies', 'water-tower' ),
		'search_items'       => __( 'Search Testimonies', 'water-tower' ),
		'not_found'          => __( 'No testimonies found', 'water-tower' ),
		'not_found_in_trash' => __( 'No testimonies found in the Trash', 'water-tower' ),
		'menu_name'          => __( 'Testimonies', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our testimonies and testimony specific data',
		'public'        => true,
		'menu_icon'		=> 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'author', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=page',
		'has_archive'   => true,
		'taxonomies' 	=> array(),
	);
	register_post_type( 'testimonies', $args );
}
add_action( 'init', 'testimonies_cpt' );

// Disable Single Post View
function testimonies_redirect_post() {
	$queried_post_type = get_query_var( 'post_type' );
	if ( is_single() && 'testimonies' == $queried_post_type ) {
		wp_redirect( get_bloginfo( 'url' ), 301 );
		exit;
	}
}

add_action( 'template_redirect', 'testimonies_redirect_post' );


function display_testimonies($arguments = array()) {
     
    $post_id = isset($arguments[ 'post_id' ]) ? $arguments[ 'post_id' ] : get_the_ID();
    $number_requested = isset($arguments[ 'number_requested' ]) ? $arguments[ 'number_requested' ] : 3;
    $section_title = isset($arguments[ 'section_title' ]) ? $arguments[ 'section_title' ] : 'Testimonies';

    $query_args = array (
        'orderby'       => 'rand',
        'post_type'     => 'testimonies',
        'program_taxo'  => get_the_slug($post_id),
        'posts_per_page'=> $number_requested,
    );
    
    $the_query = new WP_Query( $query_args );

    // The Loop
    if ( $the_query->have_posts() ) : ?>
    <div class="standard-testimonies-container">
        <h2><?php echo $section_title; ?></h2>
    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
        
        // Get Author Information
        $author = get_coauthors($post->ID)[0];
        
        ?>
            <div class="testimony-container">
                <div class="row">
                    <div class="columns medium-10">
                        <h6><i class="fa fa-quote-left"></i><?php the_title(); ?></h6>
                        <?php the_content(); ?>
                        <div class="testimony-author-info">- <?php echo $author->display_name . ', ' . rwmb_meta('author_involvement'); ?></div>
                    </div>
                    <div class="columns medium-2 author-image">
                        <?php echo get_the_post_thumbnail( $author->ID, 'thumbnail', array('class' => 'img-responsive-80') ); ?>
                    </div>
                </div>
            </div>
        
        <?php endwhile; ?>
    </div>
        
    <?php endif;
    
    /* Restore original Post Data */
    wp_reset_postdata();
    
    ?>

    


    
    
<?php } ?>