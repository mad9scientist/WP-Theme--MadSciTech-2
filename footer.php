<?php
  $themeDir = get_template_directory_uri();
?>
    <div class="clear"></div>
  </div>
  <div id="footer-wrapper">
    <div id="footer-content">
      <div id="footer-logo"> <a href="/" id="footer-logo-link">Mad Scientist Technologies</a><br />
        Quincy, Illinois 62301<br />
        1-775-MAD-SCI-9<br />
        &#115;&#116;&#097;&#102;&#102;&#064;&#109;&#097;&#100;&#115;&#099;&#105;&#116;&#101;&#099;&#104;&#046;&#099;&#111;&#109;</div>
      <div id="footer-links">
        <div id="footer-col-group">
          <div class="footer-col">
            <div class="footer-col-header">About</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/about/">About Us</a></li>
                <li><a href="/about/contact/">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Community</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/forums/">Support Forums</a></li>
                <li><a href="/faqs/">FAQs</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Support Option</div>
            <div class="footer-col-text">
              <ul>
                <!-- <li><a href="http://ticket.madscitech.com">Support Ticket System</a></li> -->
                <li><a href="/services/onpremise/">On Premise Support</a></li>
                <li><a href="/services/remote/">Remote Support</a></li>                
              </ul>
            </div>
          </div>
          <!-- <div class="footer-col">
            <div class="footer-col-header">Services</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/services/computer/">Computer Services</a></li>
                <li><a href="/services/networking/">Network Services</a></li>
                <li><a href="/services/web/">Web Services</a></li>
                <li><a href="/services/b2b/">Business Solutions</a></li>
              </ul>
            </div>
          </div> -->
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

<script type="text/javascript" src="<?php echo $themeDir; ?>/js/slider.min.js"></script>
<!--[if lt IE 7]>
  <script type='text/javascript'>  
    $(".homepage-hdr:first-child").addClass("homepage-hdr-correction");  
  </script>    
<![endif]-->
<?php } ?>
<script type='text/javascript' src='<?php echo $themeDir; ?>/js/madscitech.js'></script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11768734-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();</script>

</body>
</html>
<!-- <?php echo $wpdb->num_queries; ?> <?php echo 'queries'; ?>. <?php timer_stop(1); ?> <?php echo "seconds. Theme: $themeDir"; ?> -->