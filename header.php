<?php 
  error_reporting(E_ALL);
  ini_set('display_errors','On');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory');?>/css/ie.css" />
    <? print '<script type="text/javascript" src="';
    bloginfo('template_directory');
    print '/js/curvycorners.2.1.min.js"></script>
    <script type="text/javascript">var curvyCornersVerbose = false;</script>';
    ?>  
<![endif]-->
<!--[if lt IE 7]>
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie-style.css" />
<![endif]-->

<?php
  wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrap">
<div id="header">
  <div id="header-content">
    <?php /*<div id="header-sitecontrols">
      // Welcome, <a href="">Sign In</a> | <a href="">Help</a> 
      <div class="hdr-rss"><a class="hdr-rss" href="<?php bloginfo('rss2_url'); ">Subscribe</a></div>
      <?php /* <div id="site-search">
        <div id="site-search-field">
          <form action="http://madscitech.com/search/" id="cse-search-box">
            <div>
              <input type="hidden" name="cx" value="015463815136209645922:ojuahnyh9fo" />
              <input type="hidden" name="cof" value="FORID:9" />
              <input type="hidden" name="ie" value="UTF-8" />
              <input type="text" name="q" size="20" value="Search..." id="s" />
              <div id="site-search-btn">
                <input type="image" name="sa" value="Search" src="<?php bloginfo('template_directory'); ?><? /* /images/search-btn.gif" />
              </div>
            </div>
          </form>
        </div>
      </div> 
      <div class="clear"></div>
    </div>  */ ?>
    <h1><a href="<?php echo get_option('home'); ?>/" id="home-link">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div class="clear"></div>
  </div>
</div>
<div id="nav">
  <div id="nav_mainlinks">
    <ul>
      <?php wp_list_pages('include=3,6,10&title_li=');?>
      <li class="page_item page-item-0"><a title="Discussions" href="/forums/">Discussions</a></li>
      <?php wp_list_pages('include=90,2&title_li='); ?>    
    </ul>
  </div>
  <?php /* print '<div id="nav_secondarylinks">
    <ul>'; 
      // wp_list_pages('include=12&title_li=');
    /* print '</ul>
  </div>'; */ ?>
  <div class="clear"></div>
</div>
<div id="content">
