<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */

get_header(); ?>

     <?php 
          $i = 0;
          $theurl = $_SERVER['REQUEST_URI']; 
          $hasPage = "/page/";
     
     if(!strstr($theurl, $hasPage)) { //if HOMEPAGE page 1
     
     ?>

     	<div id="firstLevelPost" class="seasonBgColor">
              <?php $my_query = new WP_Query('showposts=1'); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; 
     	    		$video_url = get_post_meta($post->ID, 'video_url', true);
     	    		$videothumb_url = get_post_meta($post->ID, 'videothumb_url', true);
     			if($video_url){
     			?>
                    <div id="homeVdHolder">
                    <object width="458" height="258">
                         <param name="movie" value="<?php echo $video_url ?>"></param>
                         <param name="allowFullScreen" value="true"></param>
                         <param name="allowscriptaccess" value="always"></param>
                         <param name="wmode" value="window"></param>
                         <embed src="<?php echo $video_url ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="458" height="258" wmode="opaque"></embed>
                    </object>
                    </div>
                    <?php } else if($videothumb_url){ ?>
                     <a href="<?php the_permalink() ?>" rel="bookmark">
                    		<img src="<?php echo $videothumb_url ?>" alt="<?php the_title(); ?>" widht="458px" height="258px" />
                    </a>
                    <?php } else{ ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark">
                         <img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" widht="458px" height="258px" /> 
                    </a>
                    <?php } ?>
     			<p class="date"><?php the_date(); ?></p>
               	<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
     			<?php the_excerpt(); ?>
                    <p class="readMore"><a href="<?php the_permalink() ?>" rel="bookmark">Continuar lendo</a></p>
               	<p class="autor">Postado por: <?php the_author() ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
     		
     		<?php endwhile; ?>
          </div>
          
     	<div id="content">
          
         <?php $my_query = new WP_Query('showposts=9&offset=1'); while ($my_query->have_posts()) : $my_query->the_post(); if ( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); $do_not_duplicate = $post->ID; ?>
        
                    <div class="secondLevelPost">
                         <p class="date"><?php the_date(); ?></p>
                         <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                         <a href="<?php the_permalink() ?>" rel="bookmark">
                              
                              <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                                   the_post_thumbnail('thumbnail');
                              } else { ?>
                                   <img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" />
                              <?php } ?>
                               
                         </a>
                         <?php the_excerpt(); ?>
                         <p class="readMore"><a href="<?php the_permalink() ?>" rel="bookmark">Continuar lendo</a></p>
                         <p class="autor">Postado por: <?php the_author() ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
     		
                    </div>
          <?php endwhile; ?>
     	
          <?php } else { //IF HOMEPAGE after page 1 when user clicks view posts anteriores ?>

               <div id="content">
               
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                      <div class="secondLevelPost">
                         <p class="date"><?php the_date(); ?></p>
                         <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                         <a href="<?php the_permalink() ?>" rel="bookmark">
                              
                              <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                                   the_post_thumbnail('thumbnail');
                              } else { ?>
                                   <img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" />
                              <?php } ?>
                               
                         </a>
                         <?php the_excerpt(); ?>
                         <p class="readMore"><a href="<?php the_permalink() ?>" rel="bookmark">Continuar lendo</a></p>
                         <p class="autor">Postado por: <?php the_author() ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
               
                    </div>

               <?php endwhile;?>
               <?php endif; ?>
          <?php } ?>
          
          <?php if (function_exists("pagination")) {
              pagination($additional_loop->max_num_pages);
          } ?>
     
     </div><!-- close content -->

	<?php get_sidebar(); ?>
	
     <div class="clearfix"></div>
<?php get_footer(); ?>
