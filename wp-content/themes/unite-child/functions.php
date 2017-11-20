<?php
/**
*
* @author Risul Islam - risul.me
*/

/**
* Function to enqueue parent style
*/
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/**
* Create new type of post "Films"
*/
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
add_action( 'init', 'create_post_type' );


/**
* Add taxonomies to "Films" (Genre, Country, Year and Actors)
*/
function create_film_taxonomies() {
	new_taxonomy(array('name' => 'Genres', 'singular_name' => 'Genre', 'slug' => 'genre'));
	new_taxonomy(array('name' => 'Countries', 'singular_name' => 'Country', 'slug' => 'country'));
	new_taxonomy(array('name' => 'Years', 'singular_name' => 'Year', 'slug' => 'year'));
	new_taxonomy(array('name' => 'Actors', 'singular_name' => 'Actor', 'slug' => 'actor'));
}


/**
* Register taxonomy
*/
function new_taxonomy($tax) {
	$labels = array(
		'name'              => _x( $tax['name'], 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( $tax['singular_name'], 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search '.$tax['name'], 'textdomain' ),
		'all_items'         => __( 'All '.$tax['name'], 'textdomain' ),
		'edit_item'         => __( 'Edit '.$tax['singular_name'], 'textdomain' ),
		'update_item'       => __( 'Update '.$tax['singular_name'], 'textdomain' ),
		'add_new_item'      => __( 'Add New '.$tax['singular_name'], 'textdomain' ),
		'menu_name'         => __( $tax['singular_name'], 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'rewrite'           => array( 'slug' => $tax['slug'] ),
	);
	register_taxonomy( $tax['slug'], array( 'rmdb_film' ), $args );
}
add_action( 'init', 'create_film_taxonomies', 0 );

?>