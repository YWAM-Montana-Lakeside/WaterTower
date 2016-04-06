<?php

/**
 *    Missions Preview Page Template
 *    This is the page template for the
 *    campus tour page.
 *
 *    Template Name: Missions Preview
 */

get_header(); ?>


<div class="row missions-preview">
    <div class="columns large-8">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
        <div class="row missions-preview-schedule" data-equalizer>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <h4>Friday Schedule</h4>
                <div class="schedule-content">
                    <?php echo rwmb_meta('missions_preview_friday_schedule'); ?>
                </div>
            </div>
            
            <div class="medium-6 columns panel sidebar" data-equalizer-watch>
                <h4>Saturday Schedule</h4>
                <div class="schedule-content">
                    <?php echo rwmb_meta('missions_preview_saturday_schedule'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="columns large-4 tabbed-sidebar-container stick-to-parent minimal-gf-form">
        <ul class="tabs" data-tab>
          <li class="tab-title active" style="width: 50%;"><a href="#panel1">Register</a></li>
          <li class="tab-title" style="width: 50%;"><a href="#panel2">Quesitons</a></li>
        </ul>
        <div class="tabbed-sidebar-content">
            <div class="tabs-content">
              <div class="content active" id="panel1">
                <?php echo do_shortcode(rwmb_meta('missions_preview_registration_form_shortcode')); ?>
              </div>
              <div class="content minimal-gf-form" id="panel2">
                <?php echo do_shortcode(rwmb_meta('missions_preview_question_form_shortcode')); ?>
              </div>
            </div>
        </div>
    </div>
</div>
    

<?php get_footer(); ?>