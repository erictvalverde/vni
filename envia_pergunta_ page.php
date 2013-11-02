<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 * Template Name: Envia Pergunta
 */

get_header(); ?>
<div id="content">
<?php
include('settings.php');
include('email.php');
include('db.php');

if(!isset($_POST['chave']) || empty($_POST['chave'])) {
?>
<br/>
<h2 class="seasonBgColor">Oops</h2>
<p style="margin-left: 10px; font-weight: bold;">Acesso inv&aacute;lido</p>
<?php
}
else if(!isset($_POST['msg']) || empty($_POST['msg'])) {
?>
<br/>
<h2 class="seasonBgColor">Oops</h2>
<p style="margin-left: 10px; font-weight: bold;">A mensagem nao pode ser vazia.</p>
<?php	
}
else{

$chave = $_POST['chave'];
$msg = $_POST['msg'];

$chave_valida = @db_existe_chave_valida($chave);
	
if($chave_valida != null){
	$to_email = 'consultoria@vidanairlanda.com';
	$subject = "[mensagem CONSULTORIA VNI] " . $chave_valida['email'];
	$body = 'From: ' . $chave_valida['email'] . "\n\n" . $msg;
	$download_email = 'Vida Na Irlanda <tarsila@vidanairlanda.com>';
	
	if(@send_mail($to_email,$body,$subject,$download_email))
    {
    	@db_atualiza_chave($chave);
    	?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2 class="seasonBgColor"><?php the_title(); ?></h2>
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
<?php
    } 
    else 
    {
?>
<br/>
<h2 class="seasonBgColor">Oops</h2>
<p style="margin-left: 10px; font-weight: bold;">Ocorreu um erro ao enviar a sua mensagem. Por favor, tente outra vez.</p>
<?php
    }
}
else{
?>
<br/>
<h2 class="seasonBgColor">Oops</h2>
<p style="margin-left: 10px; font-weight: bold;">Voc&ecirc; j&aacute; usou o seu cr&eacute;dito!</p>
<?php
}
}
?>	
</div>
<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
