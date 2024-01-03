<?php
the_post();
$custom = get_post_custom($post->ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php the_title(); ?> - Mad Scientist Technologies Press Releases</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="dns-prefetch" href="//ajax.googleapis.com">
  <link rel="dns-prefetch" href="//madscitech.staticookie.com">
  <link rel="dns-prefetch" href="//google-analytics.com">
  <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <?php include('parts/favicon.php'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i">
  <style media="all">
    *{
      transition: 0.3s all;
      box-sizing: border-box;
    }
    body{
      background: #333;
      font-family: 'Open Sans', sans-serif;
      letter-spacing: 0.01em;
    }

    header{
      background: #fff;
      box-shadow: 0 3px 1px #09f;     
    }

    header div{
      width: 80%;
      max-width: 1100px;
      padding: 0.5em 1em;
      margin: 0 auto;
      line-height: 90px;
      display: flex;
      justify-content: space-between;
    }
    @media (max-width: 1200px){
      header div{
        flex-direction: column;
      } 
    }


    header h1{ 
      margin: 0;
    }
    header h1 a, article h1 a {
      text-indent: -9999em;
      display: inline-block;
      height: 90px;
      width: 285px;
      background: url('//madscitech.com/mst/wp-content/themes/MadSciTech-2g/images/core-img.png') -4px 0px no-repeat;
    }

    header nav a{
      color: #09f;
      text-decoration: none;
      margin: 0.3em 0.75em;
      font: 1.2em/1.3em Verdana, sans-serif;
    }
      header nav a:hover, header nav a:active{
        border-bottom: 2px solid;
        color: #036;
      }
    @media (max-width: 768px){
      header div{
        line-height: 2em;
      }
      header nav a{
        margin: 0 0.5em;
      }
    }
    @media (max-width: 424px){
      header nav a{
        display: none;
      }
      header h1{
        text-align: center;
      }
    }

    article{
      background: #fff;
      border: 1px solid #000;
      box-shadow: 0 0 5px #A5A5A5;
      width: 8.5in;
      padding: 2em;
      margin: 3em auto;
    }
    @media (max-width: 900px){
      article{
        width: 100%;
      }
    }
    @media (max-width: 350px){
      header{
        display: none;
      }
      article{
        padding: 0.5em;
        margin: 0 auto;
      }
    }

    .printerlogo{
      display: none;
    }

    article > h1 {
      border-bottom: 1px solid #ccc;
      padding-bottom: 0.5em;
      margin-top: 0;
      line-height: 90px;
    }

    article > h1 > span {
      float: right;
      font-weight: 500;
      text-transform: uppercase;
    }
    @media (max-width: 768px){
      article > h1 > span{
        display: none;
      }
    }

    article .press-release-title{
      text-align: center;
      text-transform: uppercase;
    }

    article hr{
      color: #ccc;
      background: #ccc;
      height: 0px;
    }
  </style>
  <style media="print">
    header{
      display: none;
    }
    article{
      box-shadow: none;
      border: 0 none;
      padding: 0;
      margin: 0 auto;
    }
    article h1 a{
      display: none;
    }
    .printerlogo{
      display: block;
    }
    article > h1 > span {
      float: none;
      display: block;
      text-align: right;
      margin-top: -90px;
    }
    a:after{
      content:" [" attr(href) "] ";
      font-size:0.8em;
      font-weight:normal;
    }
  </style>
</head>
<body <?php body_class(); ?>>
  <header>
    <div>
      <h1>
        <a href="/">Mad Scientist Technologies</a>
      </h1>
      <nav>
        <a href="/">Home</a>
        <a href="/services/">Services</a>
        <a href="/articles/">Articles</a>
        <a href="/videos/">Videos</a>
        <a href="/downloads/">Downloads</a>
        <a href="/about/">About</a>
      </nav>
    </div>
  </header>

  <article>
    <img src="//madscitech.com/apps/public/img/MST-Logo-Med_Nontransparent.png" class="printerlogo" height="90" width="302.417">
    <h1>
      <a href="/">Mad Scientist Technologies</a>
      <span>Press Release</span>
    </h1>

    <h2 class="press-release-title"><?php the_title(); ?></h2>

    <?php the_content(); ?>

    <small>Released: <time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('F j, Y'); ?></time></small>
    <hr>

    <p><strong>About Mad Scientist Technologies</strong></p>
    <p>Established in 2001, Mad Scientist Technologies is a privately held IT services and consulting provider, serving West Central Illinois and Northeast Missouri. Our mission is to simplify technology so that everyone can benefit from the advancements in the field of computer science.</p>

    <p><strong>Contact</strong></p>

    <p> Mad Scientist Technologies <br>
      c/o Press Relations <br>
      P.O. Box 3139 <br>
      Quincy, Illinois 62305-3139 <br>
      Press (at) MadSciTech (.) com <br>
      <a href="https://MadSciTech.com">MadSciTech.com</a></p>

    <p>
      <small>NOTICE: This document may include predictions, estimates or other information that might be considered forward-looking. While these forward-looking statements represent our current judgment on what the future holds, they are subject to risks and uncertainties that could cause actual results to differ materially. You are cautioned not to place undue reliance on these forward-looking statements, which reflect our opinions only as of the date of this presentation. Please keep in mind that we are not obligating ourselves to revise or publicly release the results of any revision to these forward-looking statements in light of new information or future events.</small>
    </p>

    <p>&copy; 2001&ndash;<?=date('Y')?> Mad Scientist Techologies LLC</p>
  </article>
  <!-- Google Analytics 4 (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-G9NKT1MB65"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-G9NKT1MB65');
  </script>
</body>
</html>
