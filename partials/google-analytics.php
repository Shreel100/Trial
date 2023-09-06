<?php if ( get_field('google_analytics_property_id', 'options') ): ?>
  <!-- Google Analytics -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php the_field('google_analytics_property_id', 'options'); ?>', 'auto');
  ga('require', 'eventTracker', {
    events: ['click', 'auxclick', 'contextmenu']
  });
  ga('require', 'outboundLinkTracker', {
    events: ['click', 'auxclick', 'contextmenu'],
    linkSelector: 'a:not([ga-on])'
  });
  ga('require', 'outboundFormTracker', {
    formSelector: '.outbound-track-submits'
  });
  ga('send', 'pageview');
  </script>
  <!-- End Google Analytics -->
<?php endif ?>

<?php if ( get_field('google_tag_manager_measurement_id', 'options') ): ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field('google_tag_manager_measurement_id', 'options'); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php the_field('google_tag_manager_measurement_id', 'options'); ?>');
  </script>
<?php endif ?>