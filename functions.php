<?php
/**
 * @package WordPress
 * @subpackage VidaNaIrlanda_theme
 */
##################################################################################################################################
// 	                                          common sense security precautions
##################################################################################################################################
//hide login errors
add_filter('login_errors',create_function('$a', "return null;"));

//hide wordpress version
add_filter( 'the_generator', create_function('$a', "return null;") );

//################################################################################################################################

automatic_feed_links();

if ( function_exists('register_sidebar') )

    register_sidebar(array(
        'name' => 'Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );    

//Short codes #####################################################################
add_shortcode("resposta", "vni_resposta");

function vni_resposta( $atts, $content = null ) {
    $content = do_shortcode( shortcode_unautop( $content ) );
	if ( '</p>' == substr( $content, 0, 4 )
	and '<p>' == substr( $content, strlen( $content ) - 3 ) )
    $content = substr( $content, 4, strlen( $content ) - 7 );
	return '<div class="resposta">' . $content . '</div>';
}

add_shortcode("video", "vni_videos");

function vni_videos( $atts, $content = null ) {
    $content = do_shortcode( shortcode_unautop( $content ) );
    if ( '</p>' == substr( $content, 0, 4 )
    and '<p>' == substr( $content, strlen( $content ) - 3 ) )
    $content = substr( $content, 4, strlen( $content ) - 7 );
    return '<div class="video-container">' . $content . '</div>';
}


//Show the first image from the post as the thumbnail
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "http://www.vidanairlanda.com/wp-content/uploads/vidanairlanda.gif";
  }
  return $first_img;
}

//*********
//Show the latest Tweet on the footer
/*function wp_echoTwitter($username){
     include_once(ABSPATH.WPINC.'/rss.php');
     $tweet = fetch_rss("https://api.twitter.com/1.1/statuses/show.json".username);
     echo $tweet->items[0]['atom_content'];
}*/

//*********
//Resize uploaded images to the size defined on the admin and remove the original
function replace_uploaded_image($image_data) {
    // if there is no large image : return
    if (!isset($image_data['sizes']['large'])) return $image_data;

    // paths to the uploaded image and the large image
    $upload_dir = wp_upload_dir();
    $uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
    $large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file'];

    // delete the uploaded image
    unlink($uploaded_image_location);

    // rename the large image
    rename($large_image_location,$uploaded_image_location);

    // update image metadata and return them
    $image_data['width'] = $image_data['sizes']['large']['width'];
    $image_data['height'] = $image_data['sizes']['large']['height'];
    unset($image_data['sizes']['large']);

    return $image_data;
}
add_filter('wp_generate_attachment_metadata','replace_uploaded_image');

//**************
//ADD paginatio

function pagination($pages = '', $range = 6)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span class=\"oneof\">Página ".$paged." de ".$pages.": </span>";//
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Primeira</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class=\"anterior\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; Anterior</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a class=\"proxima\" href=\"".get_pagenum_link($paged + 1)."\">Próxima &rsaquo;</a>";
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Última &raquo;</a>";
         echo "</div>\n";
     }
}


//Add extra comment field

function add_meta_settings($comment_id) {
    add_comment_meta($comment_id, 'data_viagem', $_POST['data_viagem'], true);
    add_comment_meta($comment_id, 'cidade_viagem', $_POST['cidade_viagem'], true);
    add_comment_meta($comment_id, 'escola_viagem', $_POST['escola_viagem'], true);
}
add_action ('comment_post', 'add_meta_settings', 1);


function ufmn_add_escola_viagem_to_comment_admin ( $comment_text ) {
    $commenter_escola_viagem = get_comment_meta( get_comment_ID(), "escola_viagem", true);


    if ( $commenter_escola_viagem ) {
        $ufmn_escola_viagem_text = '<p class="escola_viagem-text">Escola na Irlanda: ' . $commenter_escola_viagem . '</p>';
        return $ufmn_escola_viagem_text . $comment_text;
    }
    else {
        return $comment_text;
    }
}
add_filter( 'comment_text', 'ufmn_add_escola_viagem_to_comment_admin' );

function ufmn_add_data_viagem_to_comment_admin ( $comment_text ) {
    $commenter_data_viagem = get_comment_meta( get_comment_ID(), "data_viagem", true);


    if ( $commenter_data_viagem ) {
        $ufmn_data_viagem_text = '<p class="data_viagem-text">Data da viagem: ' . $commenter_data_viagem . '</p>';
        return $ufmn_data_viagem_text . $comment_text;
    }
    else {
        return $comment_text;
    }
}
add_filter( 'comment_text', 'ufmn_add_data_viagem_to_comment_admin' );

function ufmn_add_cidade_viagem_to_comment_admin ( $comment_text ) {
    $commenter_cidade_viagem = get_comment_meta( get_comment_ID(), "cidade_viagem", true);


    if ( $commenter_cidade_viagem ) {
        $ufmn_cidade_viagem_text = '<p class="cidade_viagem-text">Cidade onde moro: ' . $commenter_cidade_viagem . '</p>';
        return $ufmn_cidade_viagem_text . $comment_text;
    }
    else {
        return $comment_text;
    }
}
add_filter( 'comment_text', 'ufmn_add_cidade_viagem_to_comment_admin' );





//***********
//Remove some stuff from header
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link



?>
