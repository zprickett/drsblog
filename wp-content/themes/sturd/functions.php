<?php/** * Load Admin Panel * since 1.0 */if ( !function_exists( 'optionsframework_init' ) ) {	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );	require_once ( get_template_directory() . '/admin/options-framework.php' );}/* * Helper function to return the theme option value. If no value has been saved, it returns $default. * Needed because options are saved as serialized strings. * * This code allows the theme to work without errors if the Options Framework plugin has been disabled. * @since 1.0 */if ( !function_exists( 'of_get_option' ) ) {	function of_get_option($name, $default = false) {		$optionsframework_settings = get_option('optionsframework');		// Gets the unique option id		$option_name = $optionsframework_settings['id'];		if ( get_option($option_name) ) {			$options = get_option($option_name);		}		if ( isset($options[$name]) ) {			return $options[$name];		} else {			return $default;		}	}}
/* Content width */if ( ! isset( $content_width ) )	$content_width = 590;
function sturd_setup() {	load_theme_textdomain( 'sturd', get_template_directory() . '/languages' );	// Adds RSS feed links to <head> for posts and comments.	add_theme_support( 'automatic-feed-links' );	// This theme uses wp_nav_menu() in one location.	register_nav_menu( 'primary', __( 'Primary Menu', 'sturd' ) );	/*	 * This theme supports custom background color and image, and here	 * we also set up the default background color.	 */	add_theme_support( 'custom-background', array(		'default-color' => 'f7f7f7',	) );	// This theme uses a custom image size for featured images.	add_theme_support( 'post-thumbnails' );	add_image_size( 'big-thumb', 590, 230 ); }add_action( 'after_setup_theme', 'sturd_setup' );
function sturd_widgets_init() {	register_sidebar( array(		'name' => __( 'Sidebar', 'sturd' ),		'id' => 'sidebar',		'description' => __( 'Widgets you add here will be added to the sidebar', 'sturd' ),		'before_widget' => '<div class="widget">',		'after_widget' => '</div>',		'before_title' => '<div class="widget-title">',		'after_title' => '</div>',	) );}add_action( 'widgets_init', 'sturd_widgets_init' );
function sturd_scripts_styles() {	global $wp_styles;	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )		wp_enqueue_script( 'comment-reply' );		// Loads our main stylesheet.		wp_enqueue_style( 'sturd-style', get_stylesheet_uri(), array(), '2013-08-12' );			// Add Raleway font, used in the main stylesheet.        wp_register_style('sturd-fonts', 'http://fonts.googleapis.com/css?family=Raleway:700,400', array(), null);        wp_enqueue_style('sturd-fonts');	}add_action( 'wp_enqueue_scripts', 'sturd_scripts_styles' );function sturd_excerpt_more($more) {       global $post;	return '...<span class="read-more"><a href="'. get_permalink($post->ID) . '">Continue Reading...</a></span>';}add_filter('excerpt_more', 'sturd_excerpt_more');
function sturd_SearchFilter($query) {    if ($query->is_search) {    $query->set('post_type', 'post');    }    return $query;    }add_filter('pre_get_posts','sturd_SearchFilter');
function sturd_valid_search_form ($form) {    return str_replace('role="search" ', '', $form);}add_filter('get_search_form', 'sturd_valid_search_form');
function sturd_title($title) {if ($title == '') {return 'Untitled';} else {return $title;}}add_filter('the_title', 'sturd_title');
function sturd_wp_title( $title, $sep ) {	global $paged, $page;	if ( is_feed() )		return $title;	// Add the site name.	$title .= get_bloginfo( 'name' );	// Add the site description for the home/front page.	$site_description = get_bloginfo( 'description', 'display' );	if ( $site_description && ( is_home() || is_front_page() ) )		$title = "$title $sep $site_description";	// Add a page number if necessary.	if ( $paged >= 2 || $page >= 2 )		$title = "$title $sep " . sprintf( __( 'Page %s', 'sturd' ), max( $paged, $page ) );	return $title;}add_filter( 'wp_title', 'sturd_wp_title', 10, 2 );?>