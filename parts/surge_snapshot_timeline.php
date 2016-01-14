<div class="surge-timeline-snapshot-container">
    <h3><i class="fa fa-history"></i> Surge Updates</h3>

    <?php
    
    // Get terms from just the surge being displayed
    if (is_singular('surges')) {
        $current_surge = get_term_by( 'slug', $post->post_name, 'surges_taxo');
        $surge_term_ids = $current_surge->term_id;
    
    // Surges Archive, use all surges to filter posts    
    } else {
        $surge_term_ids = get_terms( 'surges_taxo', array(
            'hide_empty' => 0,
            'fields' => 'ids'
        ) );
    }


    // Build the query based on the surge term ids given.
    $query_args = array (
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'tax_query' => array(
        array(
            'taxonomy' => 'surges_taxo',
            'field' => 'id',
            'terms' => $surge_term_ids,
            ),
        ),
    );

    $surge_posts = new WP_Query($query_args);
    $found_posts = $surge_posts->found_posts;
    //print_r($surge_posts);

    // The Loop
    if ( $surge_posts->have_posts() ) :
        while ( $surge_posts->have_posts() ) : $surge_posts->the_post(); ?>

            <div class="surge-timeline-snapshot-post">
                <div>
                    <a href="<?php echo get_permalink(); ?>"><span class="surge-timeline-snapshot-number"><?php echo '#' . $found_posts; ?></span></a>
                    <span class="surge-timeline-snapshot-date"><?php echo get_the_date(); ?></span>
                    <a href="<?php echo get_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                    <?php echo get_excerpt_by_id($post->ID, 20); ?>
                </div>
            </div>


        <?php
        $found_posts--;
        endwhile;
    endif;

    /* Restore original Post Data */
    wp_reset_postdata();

    ?>

</div>