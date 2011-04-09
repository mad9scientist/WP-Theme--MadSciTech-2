<?php
/*
Template Name: FMA
*/
if (have_posts()) : while (have_posts()) : the_post();
	the_content('Read More');
endwhile; endif; 
?>
