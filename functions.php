<?php
automatic_feed_links();
/* Sidebar Widget */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div class="aside-item">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="aside-hdr"><h3>',
		'after_title' => '</h3></div><div class="aside-content">'
	));
}
// Clean up Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// Removes l10n.js from head 
wp_deregister_script('l10n');
// No Announcing of for Fail Login
add_filter('login_errors',create_function('$a', "return null;"));
// Kill Version Number
function killVersion() { return ''; }
add_filter('the_generator','killVersion');
// CDN jQuery
function jQuery_CDN() {
  if (!is_admin()) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js',false,'1.5.2',true);
    wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js',false,'1.5.2',true );
  }
}    
add_action('init', 'jQuery_CDN');
/* WP Polls Head Clean up */
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
remove_action('wp_head', 'poll_head_scripts');
function my_deregister_styles() {
	wp_deregister_style( 'wp-polls' );
}
 
// Add content at the end of each rss feed item
/*function insertContent($content) {
	$content = $content . '<p>Place your custom content here!</p>';
	return $content;
} */
//add_filter('the_excerpt_rss', 'insertContent');

//add_filter('the_content_rss', 'insertContent');

// spam & delete links for all versions of WordPress
function delete_comment_link($id) {
	if (current_user_can('edit_post')) {
		echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&c='.$id.'">Delete</a> ';
		echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&dt=spam&c='.$id.'">Spam</a>';
	}
} 
// Add this line in comments.php <?php delete_comment_link(get_comment_ID());

// exclude categories from feed
function excludeCatsfromFeed($query) {
	if ($query->is_feed) {
		$query->set('cat','-4');
	}
	return $query;
}
add_filter('pre_get_posts','excludeCatsfromFeed');

// Custom Post Types - FAQs

	add_action('init', 'faq_register');

	function faq_register() {
    	$args = array(
        	'label' => __('FAQs'),
        	'singular_label' => __('FAQ'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail')
        );

    	register_post_type( 'FAQ' , $args );
	}
