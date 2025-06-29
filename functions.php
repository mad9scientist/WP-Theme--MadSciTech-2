<?php
add_theme_support( 'automatic-feed-links' );
/* Sidebar Widget */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
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
//add_filter('login_errors',create_function('$a', "return null;"));
// Kill Version Number
function killVersion() { return ''; }
add_filter('the_generator','killVersion');
// CDN jQuery
function jQuery_CDN() {
  if (!is_admin()) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',false,'3.7.1',true);
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',false,'3.7.1',true );
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

// Custom Post Types - Press Releases

  add_action('init', 'press_release_register');

  function press_release_register() {
      $args = array(
          'label'           =>    'Press Releases',
          'singular_label'  =>    'Press Release',
          'public'          =>    true,
          'show_ui'         =>    true,
          'show_in_menu'    =>    true,
          'menu_position'   =>    55,
          'menu_icon'       =>    '/mst/wp-content/themes/MadSciTech-2g/images/press.png',
          'capability_type' =>    'post',
          'hierarchical'    =>    false,
          'rewrite'         =>    array('slug' => 'about/press-release', 'with_front' => false), 
          'has_archive'     =>    true,
          'supports'        =>    array('title', 'editor')
        );

      register_post_type( 'mst_press_release' , $args );
  }


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
    $video_thumbnail = $custom['mst_video_thumb'][0];
  
    echo '<label id="video_code">Video Embed Code</label><textarea id="video_code" name="video_embed" style="height:100px; width:100%;">';
    echo $video_link;
    echo '</textarea>';

    echo '<label id="video_thumbnail">Video Preview Image (URL)</label><textarea id="video_thumbnail" name="video_thumb" style="height:100px; width:100%;">';
    echo $video_thumbnail;
    echo '</textarea>';
  }
  
  function save_video(){
  	global $post;
  	update_post_meta($post->ID, "mst_video_embed", $_POST["video_embed"]);
    update_post_meta($post->ID, "mst_video_thumb", $_POST["video_thumb"]);
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

// STOP Putting P tags in things

function remove_the_wpautop_function() {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}

//add_action( 'after_setup_theme', 'remove_the_wpautop_function' );
//function no_ptags_shortcode($atts, $content = null){
//	remove_filter('the_content', 'wpautop');
//	return $content;
//}
//add_shortcode('nops','no_ptags_shortcode');

// Disable Auto P Tags for Post
// 1159 - Recommendations
function remove_ptags_from_post($content){
	if (is_page('1159')){
		$content = str_replace(['<p>','</p>'], '', $content);
	}
	return $content;
}
add_filter('the_content', 'remove_ptags_from_post', 20);

# Remove Dev/MST HQ IP
add_filter(
	'jetpack_stats_excluded_ips',
	function ( $excluded_ips ) {
		$excluded_ips[] = '206.71.195.217';
		return $excluded_ips;
	}
);

# Customize Password Protected Pages
function mst_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

    $o = ' 
    <style>.post-password-form .pwform{width:330px;margin:1em auto;}.post-password-form label{display:block;font-weight:600;border-bottom:1px solid #ccc;text-align:center;line-height:2em;}.post-password-form input[type=password]{padding:0.5em;width:220px;border-radius:3px;border:1px solid #09f;color:#555;}.post-password-form input[type=submit]{border:2px solid #09f;width:75px;background:#09f;padding:0.5em 1em;margin:1em 0 1em 1em;border-radius:3px;color:#fff;}</style>
    <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" 
            method="post" 
            class="post-password-form"><p>' . __( "This page is password protected. To access this page, enter the password:" ) . '</p>
        <div class="pwform">
            <label for="' . $label . '">' . __( "Password Required" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Login" ) . '" />
        </div>
    </form>
    <script>
        // Set Focus on Load
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector(\'input[type="password"]\').focus();
        });
    </script>
    ';
    return $o;
}

add_filter( 'the_password_form', 'mst_password_form' );
