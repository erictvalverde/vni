<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>


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
			  <p class="autor">Postado por: <?php the_author() ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
			  <p class="readMore"><a href="<?php the_permalink() ?>" rel="bookmark">Continuar lendo</a></p>
		  </div>
		<?php endwhile; ?>

		<?php if (function_exists("pagination")) {
            pagination($additional_loop->max_num_pages);
        } ?>

	<?php else : ?>

		 <p class="noMatch"><?php _e('Nenhum post foi encontrado para sua busca.'); ?></p>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
