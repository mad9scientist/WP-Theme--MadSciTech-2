<?php
/*
Template Name: Custom Search
*/
get_header(); ?>
<div id="articles">
    <h2>Search Results</h2>
    <div id="cse-search-results"></div>
    <script type="text/javascript">
        var googleSearchIframeName = "cse-search-results";
        var googleSearchFormName = "cse-search-box";
        var googleSearchFrameWidth = "930";
        var googleSearchDomain = "www.google.com";
        var googleSearchPath = "/cse";
    </script>
    <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
</div>
<?php get_footer(); ?>