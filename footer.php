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

    <?php /*  	<div id="social">
          	<h5>Me siga</h5>
               <ul>
               	<li id="facebook"><a href="http://www.facebook.com/VidaNaIrlanda" title="Facebook : Vida Na Irlanda">Facebook</a></li>
                    <?php //<li id="flickr"><a href="http://www.flickr.com/vidanairlanda/sets" title="Flickr">Flickr</a></li> ?>
                    <li id="twitter"><a href="http://www.twitter.com/VidaNaIrlanda" title="Twitter">Twitter</a></li>
                    <li id="youtube"><a href="http://www.youtube.com/user/VidaNaIrlanda" title="You Tube">You Tube</a></li>
                    <li id="rss"><a href="http://feeds.feedburner.com/feedburner/Utkz" title="RSS Feeds">RSS</a></li>
                    <?php // <li id="email"><a href="mailto:tarsila@vidanairlanda.com" title="E-mail">E-mail</a></li> ?>
               </ul>
          </div> */?>
           
          <p class="credit"><!--<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. --> <cite><?php echo sprintf(__("Powered by <a href='http://wordpress.org/' title='%s'><strong>WordPress</strong></a>"), __("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); ?></cite></p>
	    <?php wp_footer(); ?>
          
     </div>

</div><!-- close wrrapper -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2381489-4']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_trackPageLoadTime']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
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