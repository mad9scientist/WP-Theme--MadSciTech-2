<?php
get_header();
?>

<div id="articles">
<div class="article">
	<?php if (have_posts()) : ?>

  <h2>Screencasts</h2>

		<form class="faq_search" method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
     	<div id="search-field-page"><label>Search <?php single_cat_title(); ?>: </label>
      	<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
      	<input type="hidden" name="post_type" value="mst_podcast_post" />
      	<input type="submit" id="searchsubmit" value="Search" />
      </div>
      <a href="/about/contact/" class="button faq-submit">Suggest a Screencast...</a>
      
    </form>
    
    <div class="post-entry">    
		<?php while (have_posts()) : the_post(); ?>
		    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="podcast_list_links" >
          <?php the_title(); ?>
        </a>
		           
    <?php endwhile; ?>
    </div>
    
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
<?php get_sidebar(); get_footer(); ?>