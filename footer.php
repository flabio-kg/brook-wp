<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
Global $homeurl,$TplUrl,$siteurl;
?>

	
        
    <footer role="contentinfo" class="clearfix">
           &copy; 2015, Brooks England Russia. Все права защищены
    </footer>
        
        
        
        
</div> <!-- end CONTAINER -->
    
	<script src="<?php echo $TplUrl; ?>/js/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="<?php echo $TplUrl; ?>/js/plugins.js"></script>
    <script src="<?php echo $TplUrl; ?>/js/jquery.parss.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $TplUrl; ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script src="<?php echo $TplUrl; ?>/js/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo $TplUrl; ?>/js/script.js"></script>  
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
	<script>
	 $(document).ready(function() {
			$("#cookiePolicyPopup").fancybox({
				type: 'iframe',
				autoDimensions: false,
				width: 600,
				height: 410,
				showCloseButton: true,
				enableEscapeButton: true
			});		  
			 $("a.fancydesc").fancybox({
			 	type: 'inline',
       			autoDimensions: false,
				width: 710,
				height: 358,
				showCloseButton: true,
				enableEscapeButton: true,
    });
		 });
	</script>
<?php wp_footer(); ?>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36110609-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>