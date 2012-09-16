<?php
add_theme_support( 'automatic-feed-links' );
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
function rm_l10n(){
  if(!is_admin()){
    wp_deregister_script('l10n');
  }
}
add_action('init','rm_l10n');
// No Announcing of for Fail Login
add_filter('login_errors',create_function('$a', "return null;"));
// Kill Version Number
function killVersion() { return ''; }
add_filter('the_generator','killVersion');
// CDN jQuery
function jQuery_CDN() {
  if (!is_admin()) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js',false,'1.8.1',true);
    wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js',false,'1.8.1',true );
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
        	'label'           =>    'FAQs',
        	'singular_label'  =>    'FAQ',
        	'public'          =>    true,
        	'show_ui'         =>    true,
        	'menu_icon'       =>    '/mst/wp-content/themes/MadSciTech-2/images/faqs.png',
        	'capability_type' =>    'post',
        	'hierarchical'    =>    false,
        	'rewrite'         =>    array('slug' => 'faqs', 'with_front' => false), 
        	'has_archive'     =>    true,
        	'supports'        =>    array('title', 'editor', 'comments')
        );

    	register_post_type( 'mst_faq_post' , $args );
	}                     


// Custom Post Types - Screencasts
  add_action('init', 'screencast_register');
  
  function screencast_register(){
    $args = array(
        'label'             =>    'Podcasts',
        'singular_label'    =>    'Podcast',
        'public'            =>    true,
        'show_ui'           =>    true,
        'menu_icon'         =>    '/mst/wp-content/themes/MadSciTech-2/images/video.png',
        'capability_type'   =>    'post',
        'hierarchical'      =>    false,
        'rewrite'           =>    array('slug' => 'screencasts', 'with_front' => false),
        'has_archive'       =>    true,
        'supports'          =>    array('title', 'editor', 'comments')
    );
  
    register_post_type( 'mst_podcast_post' , $args );
  }
  
  // Podcasts Video Embed Field
  add_action("admin_init", "admin_init");
  add_action('save_post', 'save_video');
  
  function admin_init(){
  	add_meta_box("podcast-meta", "Video Embed", "meta_options", "mst_podcast_post", "side", "low");
  }
  
  function meta_options(){
  	global $post;
  	$custom = get_post_custom($post->ID);
  	$video_link = $custom['mst_video_embed'][0];
  
    echo '<label id="video_code">Video Embed Code</label><textarea id="video_code" name="video_embed" style="height:100px; width:100%;">';
    echo $video_link;
    echo '</textarea>';
  }
  
  function save_video(){
  	global $post;
  	update_post_meta($post->ID, "mst_video_embed", $_POST["video_embed"]);
  }


  #function mst_faq_comments_open($open, $post_id, $post_type = 'mst_faq_post'){
    /* Based upon Exclude A Category From Turn Off Comments Automatically
       URL: http://wpengineer.com/1944/exclude-category-from-turnoff-comments-automatically/  */
  #  global $wp_query;
  #  if(!$post_id){
  #    $post_id = $wp_query->post->ID;
  #  }
   
  #  if(get_post_type($post_id) === $post_type ){
  #    return true;
  #  } 
#}
#add_filter('comments_open', 'mst_faq_comments_open', 10, 2);

# Move WP Admin Bar to Bottom of Window on Site
/*function wpc_bar_bottom() { 
	<style type="text/css">
		body {
			margin-top: -28px;
			padding-bottom: 28px;
		} 
		body.admin-bar #wphead {
			padding-top: 0;
		}
		body.admin-bar #footer {
			padding-bottom: 28px;
		}
		#wpadminbar {
			top: auto !important;
			bottom: 0;
		}
		#wpadminbar .quicklinks .menupop ul {
			bottom: 28px;
		}
	</style>
}

if(current_user_can('level_10')){
// WP-Admin
//add_action( 'admin_head', 'wpc_bar_bottom' );
// Front-End
add_action( 'wp_head', 'wpc_bar_bottom');
}*/

/**
 * Remove default admin links.
 
   Array of links to remove. Choose from:
	'my-account-with-avatar', 'my-account', 'my-blogs', 'edit', 'new-content', 'comments', 'appearance', 'updates', 'get-shortlink'
	 */
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('appearance');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


