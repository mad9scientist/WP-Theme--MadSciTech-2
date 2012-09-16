<?php
get_header();
?>

<div id="articles">
<div class="article">
	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is the FAQ Page display basic header */ if (is_category('FAQs')) {?>
    <h2><?php single_cat_title(); ?></h2>
	<?php /* If this is a category archive */ } elseif (is_category()) { ?>
	<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217;</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2>Archive for <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2>Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

	<h2>Blog Archives</h2>

	<?php } ?>

		<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
           	<div id="search-field-page"><label>Search <?php single_cat_title(); ?>: </label>
            	<input type="text" value="<?php echo esc_html($s); ?>" name="s" id="s" />
            	<input type="hidden" name="cat" value="4" />
            	<input type="submit" id="searchsubmit" value="Search" />
            </div>
        </form>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post-entry">
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<?php the_time('l, F jS, Y') ?>
			<?php //the_content() ?>
			<!--<p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>-->
		</div>           

		<?php endwhile; ?>

		<?php next_posts_link('&laquo; Older Articles') ?>  <?php previous_posts_link('Newer Articles &raquo;') ?>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Sorry, but there aren't any posts in the %s section yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>