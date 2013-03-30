<?php
the_post();
$custom = get_post_custom($post->ID);
get_header();
?>
	<div id="articles">
 		<div <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php edit_post_link('&#9997;','',' '); ?> Q: <?php the_title(); ?></h1>

      	<div class="post-entry">
      	   
      		<?php the_content(); ?>
          <small>Last updated on <time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('F Y'); ?></time></small>
      	</div>
      </div>
    <?php comments_template(); ?>
    </div>
  </div>
<?php get_sidebar(); get_footer(); ?>     