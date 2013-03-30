<?php
/*
Template Name: Video Directory
*/
?>

<?php get_header(); ?>
	<div id="articles">
		<div <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
	    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        	<h1 class="entry-title"><?php edit_post_link('&#9997;','',' '); ?> <?php the_title(); ?></h1>
	      		<div class="post-entry">
	      			<?php 
	      				wp_reset_query();
					    query_posts(array( 
					        'post_type' => 'mst_podcast_post',
					        'showposts' => 10 
					    ) );  
	      				the_content(); 
					?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="video">
							<div class="thumb">
					   			<?php
					   				$custom = get_post_custom($post->ID);
									$video_thumbnail = $custom["mst_video_thumb"][0];
								?>
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo $video_thumbnail; ?>" alt="video thumbnail" height="150px" width="267">
								</a>
							</div>
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<p><?php echo get_the_excerpt(); ?></p>			
						</div>
					<?php endwhile;?>
					<a class="button archive" href="/screencasts/">Full Archive</a>
	      		</div>
	     	</div>
	   	</div>
	</div>
<?php get_footer(); ?>