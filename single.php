<?php
get_header();
?>
	<div id="articles">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<div <?php post_class('article') ?> id="post-<?php the_ID(); ?>">
			<h2><?php edit_post_link('&#9997;','',' '); the_title(); ?></h2>
      <div class="post-meta">
    		<span>Posted on <em><?php the_time('l, F jS, Y') ?></em> | by <em><a href="<?php the_author_meta('url'); ?>" rel="author"><?php the_author() ?></a></em></span>
    	</div>
      <div class="post-entry">
      
        <?php the_content('<p>Read the rest of this article &raquo;</p>'); ?>
	      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	      <p><?php edit_post_link('Edit'); ?></p>
      </div>

	    <?php endwhile; else: ?>

		  <p>Sorry, no posts matched your criteria.</p>

      <?php endif; ?>
    </div>
    <?php comments_template(); ?>
  </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>