
	<?php wp_footer(); ?>

	<!--[if lte IE 8]>
	<script src="<?php echo get_stylesheet_directory_uri().'/js/vendor/respond.min.js';?>"></script>
	<![endif]-->

	<!-- Google Analytics -->
	<script>
		var _gaq=[['_setAccount','UA-16682171-1'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//services.madscitech.com/analytics/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 2]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>

	</body>
</html>
