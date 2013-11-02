<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */
?>
<!-- begin sidebar -->
<div id="sideBar">
	
     <div id="search">
     <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
         <h4><label for="s">Buscar post</label></h4>
         <input type="text" name="s" id="s"/>
         <input class="smt" type="submit" value="<?php esc_attr_e('Search'); ?>" />
	</form>
     </div>
     
     <div id="adv">
		<h4>Patrocinadores</h4>
          <ul>
               <li class="rightMarg10 bottMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>
               <li class="leftMarg10 bottMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>
               <li class="rightMarg10 topMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>
               <li class="leftMarg10 topMarg10"><img src="<?php bloginfo('template_directory'); ?>/images/adv_def.gif" alt="" /></li>     	
          </ul>
     </div>
     
 	<div id="category">
     <h4>Categorias</h4>
          <ul>
               <?php wp_list_categories('show_count=1&title_li='); ?>
          </ul>
     </div>
     
     <div id="archive">
          <h4>Arquivo</h4>
          <form id="archiveform" action="">
               <select name="archive_chrono" onchange="window.location =(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
               <option value=''>Ver arquivo por o m&ecirc;s</option>
               <?php get_archives('monthly','','option'); ?>
               </select>
          </form>
          <h4 class="fullArchive"><a href="<?php bloginfo('url'); ?>/arquivo-geral/">Ver o arquivo completo.</a></h4>
	</div>

</div>
<!-- end sidebar -->
