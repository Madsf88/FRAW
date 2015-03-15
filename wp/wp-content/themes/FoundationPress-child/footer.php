    </section>
    <footer class="row">
        <?php do_action('foundationPress_before_footer'); ?>
        <?php dynamic_sidebar("footer-widgets"); ?>
        <?php do_action('foundationPress_after_footer'); ?>
    </footer>
    <a class="exit-off-canvas"></a>

    <?php do_action('foundationPress_layout_end'); ?>

    <?php wp_footer(); ?>
    <?php do_action('foundationPress_before_closing_body'); ?>
    <script src="<?php echo get_stylesheet_directory_uri() ; ?>/js/slideout.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/script.js"></script>

    <!-- Slideout.js navigation -->

    
    <script>
        
    </script>

    <!-- Slideout.js navigation - END -->

    <!-- Web fonts -->

    <script type="text/javascript">
          WebFontConfig = {
            google: { families: [ 'Cabin:400,500,700,400italic:latin', 'EB+Garamond::latin' ] }
          };
          (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
              '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
          })(); 
    </script>

    <!-- Web fonts - END -->

</body>
</html>
