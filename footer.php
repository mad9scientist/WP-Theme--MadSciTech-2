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
                <li><a href="/about/press-release/">Press Releases</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Community</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/faqs/">FAQs</a></li>
                <li><a href="/videos/">Videos</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-col">
            <div class="footer-col-header">Support Option</div>
            <div class="footer-col-text">
              <ul>
                <li><a href="/services/onpremise/">On Premise Support</a></li>
                <li><a href="/services/remote/">Remote Support</a></li> 
                <li><a href="/about/contact/">IT Consulting</a></li>
              </ul>
            </div>
          </div>
          
          <div class="clear"></div>
        </div>
        <div id="copyleft">
          &copy; 2001&mdash;<?=date('Y') ?> Mad Scientist Technologies LLC. Some Rights Reserved. 
          <a href="/legal/">Legal</a> &bull; 
          <a href="/about/terms/">Terms</a> &bull; 
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

<script type="text/javascript" src="<?=$themeDir ?>/js/slider.min.js"></script>
<!--[if lt IE 7]>
  <script type='text/javascript'>  
    $(".homepage-hdr:first-child").addClass("homepage-hdr-correction");  
  </script>    
<![endif]-->
<?php } ?>
<script type='text/javascript' src='<?=$themeDir ?>/js/madscitech.js'></script>

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
<!-- <?php echo $wpdb->num_queries; ?> <?php echo 'queries'; ?>. <?php timer_stop(1); ?> <?php echo "seconds. Theme: $themeDir"; ?> -->
