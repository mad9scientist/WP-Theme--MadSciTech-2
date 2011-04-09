<?php
/*
Template Name: Blank HTML
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MadSciTech.com</title>
</head>

<body>
<?php
if (have_posts()) : while (have_posts()) : the_post();

	the_content('Read More');

endwhile; endif; 
?>
</body>
</html>
