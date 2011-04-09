<?php
get_header();
?>
	<div id="articles">
 		<div <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
<?php 
  the_post(); 
	$custom = get_post_custom($post->ID);
?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>

      	<div class="post-entry">
      		<?php the_content(); ?>
      	</div>
      </div>
    <?php comments_template(); ?>
    </div>
  </div>
<?php get_sidebar(); get_footer(); ?>     