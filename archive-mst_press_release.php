<?php
get_header();
?>

<style>
	div.article{
		font-family: 'Open Sans', sans-serif;
	}
	.press-releases-container a.press-release {
	  text-decoration: none;
	  color: #0f0f0f;
	}
	.press-releases-container .press-release article {
		background: #eee;
		padding: 0.75em;
		margin: 1em 0 2em;
		box-shadow: 1px 1px 2px #888;
	}
	.press-releases-container .press-release article h4 {
		margin: 0;
		padding: 0;
		color: #606060;
		border-bottom: 0 none;
	}
	.press-releases-container .press-release article h2 {
		margin-top: 0;
		padding: 0;
	}
	.press-releases-container .press-release p{
		padding: 0.25em 0;
		letter-spacing: 0.01em;
	}
	div.article h1{
		border-bottom: 1px solid #ccc;
	}
</style>
<div id="articles">
<div class="article">

	<h1>Press Releases</h1>

	<p>Mad Scientist Technologies releases important notices and announcements from time to time.
	Below is a list of our press releases of important changes to our services, business operations
	or other information.</p>
	<p>If you have questions, please feel free to <a href="/about/contact/">contact us</a>.</p>
	
	<div class="post-entry press-releases-container">    
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			
		<a class="press-release" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<article>
				<h4><?php the_time('F jS, Y');?></h4>
				<h2><?php the_title();?></h2>
				<p><?php the_excerpt();?></p>
			</article>
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