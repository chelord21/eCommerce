<?php 

function add_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action ('wp_enqueue_scripts', 'add_resources');



// Navigation Menus
register_nav_menus(array(
	'primary' => __( 'Primary Menu'),
	'footer' => __( 'Footer Menu')

	));

// Declare WooCommerce support
add_theme_support( 'woocommerce' );


// Get top ancestor
function get_top_ancestor_id() {

	global $post;

	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;

}


// Does page have children?
function has_children() {
	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);

}

// Customize excerpt word count length
function custom_excerpt_length() {
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Theme setup
function woocommerce_setup() {

	// Navigation menus
		register_nav_menus(array(
			'primary' => __( 'Primary Menu'),
			'footer' => __( 'Footer Menu'),
			));

		// Add featured image support
		add_theme_support('post-thumbnails');
		add_image_size('small-thumbnail', 180, 120, true);
		add_image_size('banner-image', 920, 210, array('left,', 'top'));

		// Add post format support
		add_theme_support('post-formats', array('aside', 'gallery', 'link', 'workers'));

	}


// Widget Locations
function WidgetsInit() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));




}

add_action('widgets_init', WidgetsInit);

// Custom Post Types
// Our custom post type function
function create_posttype() {

	register_post_type( 'workers',
	// Options
		array(
			'labels' => array(
				'name' => __( 'Workers' ),
				'singular_name' => __( 'Worker' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'workers'),
		)
	);
}

add_action( 'init', 'create_posttype' );




// Custom Post Type - About us/Workers
function custom_post_type() {

// UI labels
	$labels = array(
		'name'                => _x( 'Workers', 'Post Type General Name', 'woocommercetheme' ),
		'singular_name'       => _x( 'Worker', 'Post Type Singular Name', 'woocommercetheme' ),
		'menu_name'           => __( 'Workers', 'woocommercetheme' ),
		'parent_item_colon'   => __( 'Parent Workers', 'woocommercetheme' ),
		'all_items'           => __( 'All Workers', 'woocommercetheme' ),
		'view_item'           => __( 'View Workers', 'woocommercetheme' ),
		'add_new_item'        => __( 'Add New Worker', 'woocommercetheme' ),
		'add_new'             => __( 'Add New', 'woocommercetheme' ),
		'edit_item'           => __( 'Edit Workers', 'woocommercetheme' ),
		'update_item'         => __( 'Update Workers', 'woocommercetheme' ),
		'search_items'        => __( 'Search Workers', 'woocommercetheme' ),
		'not_found'           => __( 'Not Found', 'woocommercetheme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'woocommercetheme' ),
	);
	
// Other options	
	$args = array(
		'label'               => __( 'workers', 'woocommercetheme' ),
		'description'         => __( 'Workers at MPAcc', 'woocommercetheme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'page-attributes', 'publicize', 'wpcom-markdown' ),
		'taxonomies'          => array( 'names' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-admin-users',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'workers', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

//AJAX search feature

function add_ajax_script() {
	wp_enqueue_script('mi-ajax', get_stylesheet_directory_uri().'/mi-ajax.js', array(), '1.0', true);
	wp_localize_script('my_search','ajax_object', admin_url('admin_ajx.php') );
}
add_action ('wp_enqueue_scripts', 'add_ajax_script');




add_action('wp_ajax_my_search', 'my_search');
add_action('wp_ajax_nopriv_my_search', 'my_search');

function my_search(){

	$product_title = 0;
	if(isset($_GET['q']))
		$product_title = sanitize_text_field( $_GET['q'] );
	
	$result = array();

	$args = array(
			"post_type" => "product",
			"posts_per_page" => -1
	);

	$search_query = new WP_Query( $args ) ;

	while($search_query->have_posts() ){ 
		$search_query->the_post();
		$patron = '/'. $product_title.'/' ;
		$subject = get_the_title();
		if ( preg_match($patron, $subject) ){
			$result[] = array(
						"id" => get_the_ID(),
						"title" => get_the_title(),
						"permalink" => get_permalink(),
						"img_url" => wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )
			);

		}

	}

	echo json_encode($result);

	wp_die();
}