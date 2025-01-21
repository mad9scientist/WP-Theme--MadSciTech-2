<?php
$value = "help";
//set cookie
setcookie("madscitech_com_404Helper",$value, time()+300);

#$ref  = $_SERVER['HTTP_REFERER'];
$page = $_SERVER['REQUEST_URI'];
/**
 * @package WordPress
 * @subpackage Starkers
 */

get_header();
?>
<div id="articles">
	<div class="article">
		<div style="text-align:center">
        	<h2><i>Uh Oh! We Broke Something!</i><br />HTTP/404 - Resource Not Found</h2>
            	<p>Requested Page: <?php echo $page; ?></p>
		<p></p>We're sorry, the page you requested could not be found. <br />You have received this error by following an outdated link, a mistyped address or we broke something.</p>
		<br /><br />
			<h3>Try Searching?</h3>
		<?php 
			get_search_form()
            	/* Old unused Google Search
	     	<form action="/search/" id="cse-search-box">
                	<div>
                        	<input type="hidden" name="cx" value="015463815136209645922:ojuahnyh9fo" />
                        	<input type="hidden" name="cof" value="FORID:9" />
                        	<input type="hidden" name="ie" value="UTF-8" />
                        	<input type="text" name="q" size="20" value="Search..." id="E404" />
                        	<input type="button" name="sa" value="Search" />
                	</div>
                </form> */
		?>
		<br /><br /><br />
<?php
// If a user lands on the 404 page more than once in a five minute period
// display contact information
if(isset($_COOKIE["madscitech_com_404Helper"])){
    $cookie = $_COOKIE["madscitech_com_404Helper"];
}

if (isset($cookie) && $cookie == "help")
	print('<div style="width:275px; margin:0 auto;">It appears you can not find what your looking for...<br />If you want to inform the developers of the problem<br /><ul style="padding-left:20px; text-align:left;"><li style="list-style:square;"><a href="/about/contact/">Sent an error report</a></li><li style="list-style:square;">Contact us on <a href="http://twitter.com/home?status=@madscitech E404 '. $page .'">Twitter via @MadSciTech</a></li></ul></div>');
?>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
