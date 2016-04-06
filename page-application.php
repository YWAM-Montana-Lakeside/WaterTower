<?php

/**
 *    Application Page Template
 *    This is the page template for any
 *    YWAM Montana | Lakeside application page.
 *
 *    Template Name: Application
 */

get_header(); ?>


<div class="row debriefing">
    <div class="columns large-8">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
    
    <div class="columns large-4 tabbed-sidebar-container stick-to-parent minimal-gf-form">
        <ul class="tabs" data-tab>
          <li class="tab-title active" style="width: 50%;"><a href="#panel2">Contact</a></li>
        </ul>
        <div class="tabbed-sidebar-content">
            <div class="tabs-content">
              <div class="content active minimal-gf-form" id="panel2">
                <?php echo do_shortcode(rwmb_meta('application_question_form_shortcode')); ?>
              </div>
            </div>
        </div>
    </div>
</div>
    

<?php get_footer(); ?>