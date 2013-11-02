<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 * Template Name: GeoLocation
 */

get_header();
?>

<div id="map_canvas"></div>

<div id="findplaces">
	<div id="content">
	
    
			   <?php query_posts('showposts=-1&cat=4,5'); ?>
               <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
               	$lat = get_post_meta($post->ID, 'latitude', true);
               	$long = get_post_meta($post->ID, 'longitude', true);
               	$map = get_post_meta($post->ID, 'mapa', true);
               ?>
               
       	<div class="secondLevelPost postIntro" <?php if($lat){ echo(" data-lat=\"$lat\" data-long=\"$long\" "); } ?>> 
	    	
	    	<p class="date"><?php the_date(); ?></p>
	    	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	    	<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" /></a>
          	<div class="excerpt"><?php the_excerpt(); ?></div>
          	<p class="autor">Postado por: <?php the_author() ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
            <p class="readMore"><a href="<?php the_permalink() ?>" rel="bookmark">Continuar lendo</a> <?php if($map){ echo('<a href="'.$map.'" class="leftMarg10 map" target="_blank"> Ver google maps</a>'); }?></p>

        </div>
			
        
		<?php endwhile; ?>

	<?php endif; ?>
	
	</div>
</div>	
	    

	
<?php get_sidebar(); ?>
<div class="clearfix"></div>
	
<?php get_footer(); ?>
