<?php
get_header(); ?>
<div id="articles">
	<?php if (have_posts()) : ?>
		<h2>Search Results</h2>
		<div class="article">
		<?php while (have_posts()) : the_post(); ?>
			<div class="post-entry">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php the_time('l, F jS, Y') ?>
				<!--<p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>-->
			</div>
		<?php endwhile; ?>

		<div class="center"><p><?php next_posts_link('&laquo; Older Articles') ?>  <?php previous_posts_link('Newer Articles &raquo;') ?></p></div>

	<?php else : ?>

	<div class="article">
		<h2>No posts found. Try a different search?</h2>
        <div id="search-field-page">
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>

</div></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>