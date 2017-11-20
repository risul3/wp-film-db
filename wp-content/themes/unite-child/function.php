<?php
/**
*
* @author Risul Islam - risul.me
*/

/**
* Function to enqueue parent style
*/
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>