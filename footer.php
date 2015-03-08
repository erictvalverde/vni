<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */
?>
	</div><!-- close contentWrap -->
     
     <div id="footer">
      <div class="ft-top-wrapp">
      	<div id="blogroll">
             <h5>Blogroll</h5>
             <ul>
                  <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
             </ul>
        </div>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : ?><?php endif; ?>
      </div>
           
          <p class="credit"><!--<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. --> <cite><?php echo sprintf(__("Powered by <a href='http://wordpress.org/' title='%s'><strong>WordPress</strong></a>"), __("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); ?></cite></p>
	    <?php wp_footer(); ?>
          
     </div><!-- close footer -->

</div><!-- close wrrapper -->

<?php if ( is_home() ) { ?>

 <div id="like-banner">
  
  <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    
</script>


    <div id="like-wrap">
    <img src="<?php bloginfo('template_directory'); ?>/images/facebook_like_banner.gif" class="like-text" />
     <span href="" class="close-like">X</span>
     <div class="fb-like" data-href="http://www.facebook.com/VidaNaIrlanda" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
</div>


<?php } ?>


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-2381489-4', 'auto');  // Replace with your property ID.
ga('require', 'displayfeatures');
ga('send', 'pageview');

</script>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/main.min.js?121"></script> <!-- main.min.js includes jQuery -->
<script type="text/javascript">
  if(document.location.protocol=='http:'){
   var Tynt=Tynt||[];Tynt.push('bua_wg9vCr4Qv4acwqm_6r');
   (function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
  }
</script>
<?php 
  wp_reset_query();
  if (is_page(array(5746, 3968))){ ?>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/infobox.js"></script>
<?php } ?>
</body>
</html>