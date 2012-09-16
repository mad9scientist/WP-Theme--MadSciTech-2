<?php
/*
Template Name: Home page
*/
get_header();
?>
	<div id="articles">
        <div id="FMA">
            <!-- START AnythingSlider -->
            <!-- Created by Chris Coyier of CSS-Tricks.com -->
            <div class="anythingSlider">
                <div class="wrapper">
                    <ul>
                        <?php 	// Page ID to FMA Page
							query_posts('page_id=16');
							if (have_posts()) : while (have_posts()) : the_post();
								the_content();
							endwhile; endif;
							//Reset Query
				            wp_reset_query();
						?>
                	</ul>
                </div>
            </div>
            <!-- END AnythingSlider -->
        </div>
         <?php //Page ID to HomePage Sticky
			       query_posts('page_id=18');
      			 if (have_posts()) : while (have_posts()) : the_post();
      			   the_content();
      			 endwhile; endif;
      			 //Reset Query
      			 wp_reset_query();
		    ?>
        <!-- START - Get four most current post -->
        <h2 class="homepage-hdr">Articles &amp; Screencasts</h2>
        <?php
    			//Turn on More Tag
    			global $more;
    			$more = 0;
			
          //The Query
          query_posts('posts_per_page=4&cat=-4');
          //The Loop
          if ( have_posts() )
			       while ( have_posts() ) : the_post(); ?>
				        <div <?php post_class('article') ?> id="post-<?php the_ID() ?>">
				          <h2><?php edit_post_link('&#9997;','',' '); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                   <div class="post-meta">
                        <span><em>Posted on:</em> <?php the_time('F jS, Y') ?></span>
                   </div>
                   <div class="post-entry">
                    <?php the_content('Read More &raquo;'); ?>
                   </div>
				        </div>
            <?php  endwhile;

            //Reset Query
            wp_reset_query(); ?>
        <!-- END - Get first four most current post -->
        <a href="/articles/" id="archive-link">More Articles</a>
	</div>
<?php
	get_sidebar();
	get_footer();
?>