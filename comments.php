<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */


if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<div id="commetWrap">

	<?php if (!is_page('viagens')): ?>
		
		<h3 id="comments">

			<?php if ( comments_open() ) : ?>
	
			<?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
			<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
	
			<?php endif; ?>

		</h3>

	<?php endif; ?>





<?php if ( have_comments() ) : ?>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>


	<?php if (is_page('viagens')): ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<?php
				$GLOBALS['comment'] = $comment;
				$data_viagem = get_comment_meta(get_comment_ID(),"data_viagem", true);
				$escola_viagem = get_comment_meta(get_comment_ID(),"escola_viagem", true);
				$cidade_viagem = get_comment_meta(get_comment_ID(),"cidade_viagem", true);
				$cidade_viagem = get_comment_meta(get_comment_ID(),"cidade_viagem", true);
			?>

			<?php echo get_avatar( $comment, 50 ); ?>

			<p class="vg_det">Nome: <?php comment_author() ?>	</p>
			<p class="vg_det">Email: <a href="mailto:<?php comment_author_email() ?>"><?php comment_author_email() ?></a></p>
			<p class="vg_det">Cidade onde moro: <?php echo $cidade_viagem;?></p>
			<p class="vg_det">Escola na Irlanda: <?php echo $escola_viagem;?></p>
			<p class="vg_det">Data da viagem: <strong><?php echo $data_viagem;?></strong></p>			

		</li>
	
	<?php else : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

			<?php echo get_avatar( $comment, 50 ); ?>

			<?php comment_text() ?>
			<p class="autor"><cite><?php comment_type(_x('Comment', 'noun'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite> <?php edit_comment_link(__("Edit This"), ' |'); ?></p>

		</li>

	<?php endif; ?>



	



<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.'); ?></p>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<h3 id="postcomment">
	<?php if (!is_page('viagens')): ?>
		<?php _e('Leave a comment'); ?>
	<?php else: ?>
		Deixe seus detalhes
	<?php endif ?>	

</h3>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
     <p align="logUser"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() ) );?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<p>
 	<label for="author"><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></label>
	<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
</p>

<p>
	<label for="email">
		<?php if (!is_page('viagens')): ?>
			<?php _e('Mail (will not be published)');?> 
		<?php else: ?>
			<?php _e('E-mail');?> 
		<?php endif; ?>

		<?php if ($req) _e('(required)'); ?></label>
	<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
</p>

	<?php if (!is_page('viagens')): ?>
	<p>	
		<label for="url"><?php _e('Website'); ?></label>
		<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
	</p>
	<?php endif; ?>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<?php if (is_page('viagens')): ?>

	<p>
	<label>Data da viagem: <i>(dd/mm/aaaa)</i></label>
	<input type="text" name="data_viagem" id="data_viagem"  tabindex="4" />
	</p>

	<p>
	<label>Cidade onde moro:</label>
	<input type="text" name="cidade_viagem" id="cidade_viagem"  tabindex="5" />
	</p>

	<p>
	<label>Escola na Irlanda:</label>
	<input type="text" name="escola_viagem" id="escola_viagem"  tabindex="6" />
	</p>

	<p>
		
		<input type="hidden" name="comment" id="comment"  value="Post na página viagens" />
	</p>

<?php else: ?>

	<p>
	<label for="comment">Deixe sua mensagem</label>
	
	<p>
		Coment&aacute;rios que n&atilde;o contribuem para o t&oacute;pico acima ser&atilde;o deletados.
	</p>

	<textarea name="comment" id="comment" cols="58" rows="10" tabindex="5"></textarea>
	</p>
	

<?php endif; ?>
<p>
<?php if (!is_page('viagens')): ?>
	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />
<?php else: ?>
	<input name="submit" type="submit" id="submit" tabindex="7" value="Enviar detalhes" />
<?php endif; ?>


<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>

</div>