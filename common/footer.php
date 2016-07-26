</div><!-- end content -->

<?php
echo js_tag('jquery.fancybox.pack', 'javascripts/vendor');
echo js_tag('jquery.fancybox-buttons', 'javascripts/vendor');
?>

<footer>

    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <p class="credits">
          <a target="_blank"  class="designed" href="http://portsidenewyork.org">Designed by PortSide New York</a> 
          <a target="_blank" class="powered"  href="http://omeka.org">Proudly powered by Omeka</a>
        </p>

    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.dropDown();

        jQuery("a.fancybox").fancybox({
            'loop'          :   false,
           	helpers         : {
                title       : { type : 'inside' },
                buttons	: {}
           	}
        });
    });
</script>

<?php /* Google Analytics code */ ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79824384-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>
