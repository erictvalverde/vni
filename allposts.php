<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 * Template Name: All Posts
 */

get_header();
?>
<?php
$debut = 0; //The first article to be displayed
?>
	<div id="content">

	<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	 
		<h2 class="seasonBgColor">Arquivo geral</h2>
 	 	<ul id="fullPostList">
        
		<?php while (have_posts()) : the_post(); ?>
        
        <?php
			$myposts = get_posts('numberposts=-1&offset=$debut');
			foreach($myposts as $post) :
		?>
                   	<li><?php //post_class() ?>
                         <span><?php the_time('d/m/y') ?></span>
                         <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </li>
		<?php endforeach; ?>
        
		<?php endwhile; ?>

	<?php endif; ?>
	
	</div>

<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
