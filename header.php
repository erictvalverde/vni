<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link href="<?php bloginfo('template_directory'); ?>/css/main.css?300" type="text/css" rel="stylesheet">
     <!-- link href="http://feeds.feedburner.com/VidaNaIrlanda" rel="alternate" title="Vida Na Irlanda" type="application/rss+xml" /-->
    <link href="http://feeds.feedburner.com/feedburner/Utkz" rel="alternate" title="Vida Na Irlanda" type="application/rss+xml" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	<link rel="me" href="https://plus.google.com/102794598167095726751?rel=author">
	
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.min.js"></script>
	
	<?php wp_head(); ?>
</head>
<?php flush(); ?>
<body <?php body_class('no-js'); ?>>
<div id="wrapper">
	<div id="header">
		<h1>
			<a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>
		</h1>
          <ul id="navigation">
          	   <li id="home"><a href="<?php bloginfo('url'); ?>/">Home</a></li>
          	   <li id="busca"><a href="#search-3">Busca</a></li>
          	   <li id="categorias"><a href="#categories-3">Categorias</a></li>
          	   <li id="arquivos"><a href="#archives-3">Arquivos</a></li>
               <li id="sobre"><a href="<?php bloginfo('url'); ?>/sobre-o-blog/">Sobre o Blog</a></li>
               <li id="duvidas"><a href="<?php bloginfo('url'); ?>/duvidas">FAQ</a></li>
               <li id="contato"><a href="/contato">Contato</a></li>
               <li id="facebook" class="social"><a href="http://www.facebook.com/VidaNaIrlanda" title="Facebook : Vida Na Irlanda" target="_blank">Facebook</a></li>
               <li id="twitter" class="social"><a href="http://www.twitter.com/VidaNaIrlanda" title="Twitter" target="_blank">Twitter</a></li>
               <li id="youtube" class="social"><a href="http://www.youtube.com/user/VidaNaIrlanda" title="You Tube" target="_blank">You Tube</a></li>
               <li id="rss" class="social"><a href="http://feeds.feedburner.com/feedburner/Utkz" target="_blank">RSS</a></li>
          </ul>
	</div><!--end header-->
     <div id="contentWrap">