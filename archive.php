<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */

get_header();
?>

	<div id="content">

	<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="seasonBgColor">Categoria: <?php single_cat_title(); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="seasonBgColor">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="seasonBgColor">Arquivo para: <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="seasonBgColor">Arquivo para: <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="seasonBgColor">Arquivo para: <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="seasonBgColor">Arquivo </h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="seasonBgColor">Arquivo do Blog</h2>
 	  <?php } ?>



		<?php while (have_posts()) : the_post(); ?>
               
               	<div class="secondLevelPost" ><?php //post_class() ?>
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

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<p class=\"noMatch\"><?php _e('Sorry, no posts matched your criteria.'); ?>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<p class=\"noMatch\">Sorry, but there aren't any posts with this date.</p>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<p class=\"noMatch\">Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
		} else {
			echo("<p class=\"noMatch\">No posts found.</p>");
		}
		get_search_form();

	endif;
?>
	
        <?php if (function_exists("pagination")) {
            pagination($additional_loop->max_num_pages);
        } ?>

	</div>

<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
