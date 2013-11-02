<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 * Template Name: Fazer pergunta
 */

get_header(); ?>
<script type="text/javascript">
function Trim(str){
	return str.replace(/^\s+|\s+$/g,"");
}

function valida(){
	var msg = document.getElementById('msg');
	var valor = Trim(msg.value);
	
	if(valor.length == 0){
		alert('Por favor, digite a sua mensagem!');
		
		return false;
	}
	else{
		return true;
	}
}
</script>
<div id="content">
<?php
include('db.php');

if(!isset($_GET['id']) || empty($_GET['id'])) {
?>
<br/>
<h2 class="seasonBgColor">Oops</h2>
<p style="margin-left: 10px; font-weight: bold;">Acesso inv&aacute;lido</p>
<?php
}
else{
$data = $_GET['id'];

$data_dec = rawurldecode($data);

$chave_valida = @db_existe_chave_valida($data_dec);

if($chave_valida != null){
?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2 class="seasonBgColor"><?php the_title(); ?></h2>
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<br/>
				<br/>
				
				Seu email: <b><?php echo $chave_valida['email'] ?></b><br/><br/>
				<form action="mensagem-enviada" method="post" onsubmit="return valida();">
				<input type="hidden" name="chave" value="<?php echo $data_dec ?>"/>
				Escreva sua mensagem<br/>
				<textarea id="msg" name="msg" rows="20" cols="60"></textarea>
				<input type="submit" value="Enviar" />
				</form>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	
<?php
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
