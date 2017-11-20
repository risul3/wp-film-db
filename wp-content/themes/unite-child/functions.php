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


/**
* Action hook for display Country, Genre, Ticket Price and Release Date
*/
function rmdb_get_film_terms_and_fields() {
	// Get post id
	$post_id = get_the_ID();
	
	echo get_the_term_list( $post_id, 'country', '<h4><small>Country:</small> ', ', ', '</h4>' );

	echo get_the_term_list( $post_id, 'genre', '<h4><small>Genre:</small> ', ', ', '</h4>' );

	if( get_field('ticket_price') )
		echo '<h4><small>Ticket Price: </small>'.get_field('ticket_price').'</h4>';

	if( get_field('release_date') )
		echo '<h4><small>Release Date: </small>'.get_field('release_date').'</h4>';
}
add_action('rmdb_get_film_terms_and_fields', 'rmdb_get_film_terms_and_fields');


/**
*
*/
function rmdb_last_5_films() {
	$args = array(
		'numberposts' => 5,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'rmdb_film',
		'post_status' => 'publish'
	);

	$recent_posts = wp_get_recent_posts( $args );
	echo '<h3>Latest 5 Films</h3><hr><ul class="list-group">';
	foreach( $recent_posts as $recent ){
		echo '<li class="list-group-item"><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a> </li> ';
	}
	echo '</ul>';
	wp_reset_query();
}
add_shortcode('rmdb_last_5_films', 'rmdb_last_5_films');

?>