<?php
the_post();
$custom = get_post_custom($post->ID);
$video_embed = $custom["mst_video_embed"][0];

get_header();
?>
	<div id="articles">
 		<div <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php edit_post_link('&#9997;','',' '); ?>Screencast: <?php the_title(); ?></h1>

      	<div class="post-entry">
      	  <?php 
          // If $video_embed does not include <iframe assume YouTube Video ID
          if(!preg_match("/<iframe/", $video_embed)){ ?>
            <iframe width="100%" height="400" src="//www.youtube.com/embed/<?php echo $video_embed; ?>" frameborder="0" allowfullscreen></iframe>
          <?php } else { 
            // Else post as normal video embed code
            echo $video_embed;
          } ?>

          <hr />      	
 
      		<?php the_content(); ?>
      	</div>
      </div>
    <?php comments_template(); ?>
    </div>
  </div>
<?php get_sidebar(); get_footer(); ?>     
