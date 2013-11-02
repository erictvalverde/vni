<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 * Template Name: Default Page
 */

get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2 class="seasonBgColor"><?php the_title(); ?></h2>
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	
	
	</div>

<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
