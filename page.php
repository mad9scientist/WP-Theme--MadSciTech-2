<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

get_header(); ?>
<div id="articles">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
                <h2 class="page-hdr"><?php edit_post_link('&#9997;','',' '); the_title(); ?></h2>
                <div class="article">
					<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
                    <?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
                <!-- <?php edit_post_link('? Edit this entry.', '<p>', '</p>'); ?> -->
			<?php comments_template(); ?>
		</div>
		<?php endwhile; endif; ?>
	
</div>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>