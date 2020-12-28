<?php
	

//This filter shows the maintenance template
//add_filter( 'template_include', 'show_maintenance_page', 99 );
function show_maintenance_page( $template ) {
    if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ){
        $new_template = locate_template( array( 'maintenance-template.php' ) );
        if ( !empty( $new_template ) ) {
            return $new_template;
        }
	}
	return $template;
}

// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	
	// Default thumbnail size
	set_post_thumbnail_size(1200, 1200, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'arcanacon' ),
				'shortName' => __( 'S', 'arcanacon' ),
				'size'      => 12,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'arcanacon' ),
				'shortName' => __( 'M', 'arcanacon' ),
				'size'      => 16,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'arcanacon' ),
				'shortName' => __( 'L', 'arcanacon' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'arcanacon' ),
				'shortName' => __( 'XL', 'arcanacon' ),
				'size'      => 36,
				'slug'      => 'huge',
			),
		)
	);

	add_theme_support(
		'editor-color-palette',
		array(
	 
			array(
				'name'  => __( 'Purple', 'arcanacon' ),
				'slug'  => 'purple',
				'color' => '#5e2696',
			),
			array(
				'name'  => __( 'Grey', 'arcanacon' ),
				'slug'  => 'grey',
				'color' => '#4d4d4d',
			),
			array(
				'name'  => __( 'Pink', 'arcanacon' ),
				'slug'  => 'pink',
				'color' => '#f552a6',
			),
			array(
				'name'  => __( 'Beige', 'arcanacon' ),
				'slug'  => 'beige',
				'color' => '#ffeca7',
			),
			array(
				'name'  => __( 'White', 'arcanacon' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
		)
	);

	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );	
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );


function arcanacon_blocks()
{
	wp_register_script(
		'arcanacon-blocks-script', 
		get_template_directory_uri() . '/build/index.js', 
		array('wp-blocks', 'wp-components', 'wp-i18n', 'wp-data', 'wp-editor')
	);

	wp_enqueue_style( 'arcanacon-blocks-styles-editor', get_template_directory_uri() . '/public/css/editor.css', array(), filemtime(get_template_directory() . '/src/scss'), 'all' );


	//ToDo: This below should be a loop from an array of blockNames
	register_block_type(
		'arcanacon/custom-cta', 
		array(
			'editor_script' => 'arcanacon-blocks-script',
		)
	);

	register_block_type(
		'arcanacon/affiliates',
		array(
			'editor_script' => 'arcanacon-blocks-script',
			'editor_style'  => 'arcanacon-blocks-styles-editor',
		)
	);

	register_block_type(
		'arcanacon/full-width-block',
		array(
			'editor_script' => 'arcanacon-blocks-script',
			'editor_style'  => 'arcanacon-blocks-styles-editor',
		)
	);

	
}
add_action('init', 'arcanacon_blocks'); 



//Adds Featured Image URL to the WP REST Post API Response
add_action('rest_api_init', 'get_featured_image');
function get_featured_image(){
	register_rest_field('affiliate', 'featured_image', 
		array(
			'get_callback' => 'arcanacon_get_featured_image',
			'update_callback' => null, //we only require the url
			'schema' => null
		)
	);
}

function arcanacon_get_featured_image ($object, $field_name, $request){
	if($object['featured_media']){
		$img = wp_get_attachment_image_src( $object['featured_media'], 'full', false);
		return $img[0];
	}
}

/* Adds full width block support */
add_theme_support('align-wide');

function remove_comments($wp_admin_bar){
	$wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'remove_comments', 999 );