<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */

get_header();
?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
         	<p class="date seasonBgColor"><?php the_date(); ?></p>
         	<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style addthisTop">
				<a class="addthis_button_google_plusone"></a>
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<!-- AddThis Button END -->
			<h2><?php the_title(); ?></h2>
			<div class="entry clearfix">
				<?php the_content(); ?>
				 <p class="autor">Postado por: <a href="<?php bloginfo('url'); ?>/sobre-o-blog" rel="author"><?php the_author() ?></a> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
			</div>
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_google_plusone"></a>
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<!-- Google Ads -->
			<div id="googleAds">
			<script type="text/javascript"><!--
				google_ad_client = "ca-pub-4091506455355579";
				/* Vida Na Irlanda- single post page */
				google_ad_slot = "2024428588";
				google_ad_width = 468;
				google_ad_height = 60;
				//-->
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			</div>
			<!-- AddThis Button END -->
			<?php comments_template(); ?>
		</div>
		<div class="archiveNav">
			<div class="left"><?php previous_post_link('%link') ?></div>
			<div class="right"><?php next_post_link('%link') ?></div>
		</div>
	<?php endwhile; else: ?>

		<p class="noMatch"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		
         

	<?php endif; ?>
	

     
	</div>

<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-532efd3002966c1b"></script>
