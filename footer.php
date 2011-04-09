    <div class="clear"></div>
  </div>
  <div id="footer-wrapper">
    <div id="footer-content">
      <div id="footer-logo"> <a href="/" id="footer-logo-link">Mad Scientist Technologies</a><br />
        Kinderhook, Illinois 62345<br />
        1-775-MAD-SCI-9<br />
        &#115;&#116;&#097;&#102;&#102;&#064;&#109;&#097;&#100;&#115;&#099;&#105;&#116;&#101;&#099;&#104;&#046;&#099;&#111;&#109;</div>
      <div id="footer-links">
        <div id="footer-col-group">
          <div class="footer-col">
            <div class="footer-col-header">About</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="<?php bloginfo('siteurl'); ?>/about/">About Us</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/about/contact/">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Community</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/forums/">Support Forums</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/category/faqs/">FAQs</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Projects</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="http://ticket.madscitech.com">Support Ticket System</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/support/remote/">Remote Support</a></li>                
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Services</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="<?php bloginfo('siteurl'); ?>/services/computer/">Computer Services</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/services/networking/">Network Services</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/services/web/">Web Services</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/services/b2b/">Business Solutions</a></li>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div id="copyleft">
          &copy; <?php echo '2001 - ' . date('Y'); ?> Mad Scientist Technologies, Inc. Some rights reserved. 
          <a href="/about/terms/">Terms &amp; Conditions</a> &bull; 
          <a href="/about/privacy/">Privacy</a> &bull; 
          <a href="/about/trademarks/">Trademarks</a>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

<!-- Scripts -->
<?php
wp_footer();
 
if (is_page_template('home-page.php')) { 
?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.anythingslider.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slider.min.js"></script>
<!--[if lt IE 7]>
  <script type='text/javascript'>  
    $(".homepage-hdr:first-child").addClass("homepage-hdr-correction");  
  </script>    
<![endif]-->
<?php } ?>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/madscitech.js'></script>

<!-- Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11768734-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>