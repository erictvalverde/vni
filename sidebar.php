<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */
?>
<!-- begin sidebar -->
<div id="sideBar">
	
     <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>

	
     <div id="search-3">
     <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
         <h4>Buscar post</h4>
         <label for="s">Buscar post</label>
         <input type="text" name="s" id="s"/>
         <input id="searchsubmit" class="smt" type="submit" value="<?php esc_attr_e('Search'); ?>" />
	</form>
     </div>
     
     <div id="text-4">
		<h4>Patrocinadores</h4>
          <ul>
               <li class="rightMarg10 bottMarg10"><a href="http://visitdublin.ie" target="_blank" title="Visit Dublin (abre em nova janela)"><img src="<?php bloginfo('template_directory'); ?>/images/visit_dublin.gif" alt="Visit Dublin" /></a></li>
               <li class="leftMarg10 bottMarg10"><a href="http://www.mangointercambios.com.br" target="_blank" title="Mango Interc&acirc;mbios (abre em nova janela)"><img src="<?php bloginfo('template_directory'); ?>/images/mango_banner.jpg" alt="Mango Interc&acirc;mbios" /></a></li>
               <li class="rightMarg10 topMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>
               <li class="leftMarg10 topMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>     	
          </ul>
     </div>
     
 	<div id="categories-3">
     <h4>Categorias</h4>
          <ul>
               <?php wp_list_categories('show_count=1&title_li='); ?>
          </ul>
     </div>
     
     <div id="archives-3">
          <h4>Arquivo</h4>
          <form id="archiveform" action="">
               <select name="archive_chrono" onchange="window.location =(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
               <option value=''>Ver arquivo por o m&ecirc;s</option>
               <?php get_archives('monthly','','option'); ?>
               </select>
          </form>
          <h4 class="fullArchive"><a href="<?php bloginfo('url'); ?>/arquivo-geral/">Ver o arquivo completo.</a></h4>
	</div>
<?php endif; ?>

<!-- <a id="backtop" href="#wrapper">Topo</a> -->

</div>
<!-- end sidebar -->
