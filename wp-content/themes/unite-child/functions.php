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


/**
* Create new type of post "Films"
*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'rmdb_film',
		array(
		  'labels' => array(
		    'name' => __( 'Films' ),
		    'singular_name' => __( 'Film' )
		  ),
		  'public' => true,
		  'has_archive' => true,
		)
	);
}
?>