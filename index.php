<?php get_header(); ?>
<?php 
	if (have_posts()) : ?>
	<div id="articles">
	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class('article') ?> id="post-<?php the_ID(); ?>">
			<h2><?php edit_post_link('&#9997;','',' '); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="post-meta">
        		<span>Posted on <em><?php the_time('F jS, Y') ?></em> | by <em><a rel="author" href="<?php the_author_meta('url'); ?>"><?php the_author() ?></a></em></span>
        	</div>
            <div class="post-entry">
			<?php the_content('Read More &raquo;'); ?>
			<!-- <p><?php edit_post_link('Edit', ''); ?></p> -->
            </div>
		</div>

	<?php endwhile; ?>
		<div id="navigation">
	  		<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
	  		<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
	     	<div class="clear"></div>
	    </div>
	
<?php else : ?>
	<h2>Not Found</h2>
	<p>Sorry, but you are looking for something that isn't here.</p>
	<?php get_search_form(); ?>

<?php endif; ?>
		
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>