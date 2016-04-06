<?php

/**
 *    Debriefing Page Template
 *    This is the page template for the
 *    YWAM Montana | Lakeside debriefing page.
 *
 *    Template Name: Debriefing
 */

get_header(); ?>


<div class="row debriefing">
    <div class="columns large-8">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
        <?php
        /**
         *     Leader Section
         *     This section displays all of the leaders of the
         *     particular program.
         */

        $terms = rwmb_meta( 'debriefers', 'type=select&multiple=1' );

        if ( ! empty($terms) ) {
            echo '<div data-magellan-destination="school-leaders" class="authors-container program-leaders-container">';
            echo '<h2>Debriefing Staff</h2>';
            foreach ( $terms as $term ) {
                $author_object = get_post( $term, OBJECT );
                $leader_ids[] = $author_object->ID;
            }
            display_authors( $post->ID, $leader_ids );
            echo '</div>';
        }

        ?>
    </div>
    
    <div class="columns large-4 tabbed-sidebar-container stick-to-parent minimal-gf-form">
        <ul class="tabs" data-tab>
          <li class="tab-title active" style="width: 50%;"><a href="#panel1">Apply</a></li>
          <li class="tab-title" style="width: 50%;"><a href="#panel2">Contact</a></li>
        </ul>
        <div class="tabbed-sidebar-content">
            <div class="tabs-content">
              <div class="content minimal-gf-form active" id="panel1">
                <?php echo do_shortcode(rwmb_meta('debriefing_registration_form_shortcode')); ?>
              </div>
              <div class="content minimal-gf-form" id="panel2">
                <?php echo do_shortcode(rwmb_meta('debriefing_question_form_shortcode')); ?>
              </div>
            </div>
        </div>
    </div>
</div>
    

<?php get_footer(); ?>