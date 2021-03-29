<?php 
/* adding css, js  and ajax */
function go_gallery_scripts_styles(){

/* slick jquery carousel Plugin  */
wp_enqueue_style('slick-carousel-css','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(),'1.9.0','all');
wp_enqueue_script('slick-carousel-js','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',array('jquery'),'1.9.0',true);

/* fontAwesome  */
wp_enqueue_style('fontAwesome-css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css', array(),'2.3.4','all');
wp_enqueue_script('fontAwesome-js','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js',array(),'2.3.4',true);

/* local css and js */   
wp_enqueue_style('go-styles-css', plugins_url('../assets/go-styles.css', __FILE__));
wp_enqueue_script( 'go-scprit-js', plugins_url('../assets/go-script.js', __FILE__), array('jquery'), '1.0', true);

/* ajax URL */
wp_localize_script( 'go-scprit-js','admin_url', array('ajax_url' =>admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts','go_gallery_scripts_styles');

/* Remove tags */
remove_filter( 'the_content', 'wpautop' );

?>