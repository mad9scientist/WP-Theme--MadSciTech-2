<?php 
  //error_reporting(E_ALL);
  //ini_set('display_errors','On');
  $themeDir = get_template_directory_uri();
  $themeStyle = get_stylesheet_directory_uri();
  $siteRoot = home_url();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link rel="dns-prefetch" href="//madscitech.staticookie.com">
<link rel="dns-prefetch" href="//google-analytics.com">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php #bloginfo('name'); ?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $themeDir; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo $themeStyle;?>/css/ie.css" />
    <?php/* print '<script type="text/javascript" src="';
    echo $themeDir . '/js/curvycorners.2.1.min.js"></script>
    <script type="text/javascript">var curvyCornersVerbose = false;</script>';*/  ?>  
<![endif]-->
<!-- Forgive me, that I have sinned, with inline styles for Stupid Internet Explore!!! -->
<!--[if IE 7]>
  <style type="text/css">
    #onpremise-info, #remote-info, #online-info {height:100px; width:92%; padding-top: 0px; }
  </style>
<![endif]-->
<!--[if lte IE 7]>
  <style type="text/css">
    #header-content .hdrSocialIco{text-indent:0; font:0/0 a;}
  </style>
<![endif]-->
<!--[if lt IE 7]>
     <link rel="stylesheet" type="text/css" href="<?php echo $themeStyle; ?>/css/ie-style.css" />
<![endif]-->

<?php
  wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrap">
<div id="header">
  <div id="header-content">
    <div id="header-sitecontrols">
      <?php #Welcome, <a href="">Sign In</a> | <a href="">Help</a> 
      #<div class="hdr-rss"><a class="hdr-rss" href="<?php bloginfo('rss2_url'); ">Subscribe</a></div> 
       /*<div id="site-search">
        <div id="site-search-field">
          <form action="http://madscitech.com/search/" id="cse-search-box">
            <div>
              <input type="hidden" name="cx" value="015463815136209645922:ojuahnyh9fo" />
              <input type="hidden" name="cof" value="FORID:9" />
              <input type="hidden" name="ie" value="UTF-8" />
              <input type="text" name="q" size="20" value="Search..." id="s" />
            </div>
          </form>
        </div>
      </div> 
      <div class="clear"></div> */?>
    </div>  
    
    <div class="floatRight socialIcons">
      <a href="/google+/" titile="Join us on Google+" class="hdrSocialIco hdrIcoGoogle">Join us on Google+</a>
	    <a href="/facebook/" title="Like us on Facebook" class="hdrSocialIco hdrIcoFB">Like us on Facebook</a>
	    <a href="/twitter/" title="Follow us on Twitter" class="hdrSocialIco hdrIcoTwitter">Follow us on Twitter</a>
    </div>
    
    <h1><a href="<?php echo $siteRoot; ?>/" id="home-link">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div class="clear"></div>
  </div>
</div>
<div id="nav">
  <div id="nav_mainlinks">
    <ul>
      <?php
        $args  = array(
          'include' => '3,6,10,690,90,2',
          'sort_column' => 'menu_order',
          'post_type' => 'page',
          'title_li' => '',
          'echo' => 1
         );
        wp_list_pages($args);
       ?> 
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
