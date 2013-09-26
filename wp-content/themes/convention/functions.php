<?php

if ( ! isset( $content_width ) ) $content_width = 700;

if ( ! function_exists( 'convention_setup' ) ) :

function convention_setup() {

	/**
	 * Feed Links
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Languages
	 */
	load_theme_textdomain( 'convention', get_template_directory() . '/languages' );
	
	/**
	 * Post Thumbnails
	 */
     add_theme_support('post-thumbnails');
     set_post_thumbnail_size( 650, 250, true );
     
	/**
	 * Register Menu
	 */
     register_nav_menus(array(
        'header-nav' => 'Header Menu',
     ));
     
    /**
	 * Editor Style
	 */
     add_editor_style();

}
endif; // convention_setup
add_action( 'after_setup_theme', 'convention_setup' );

// Excerpt Link

function convention_excerpt_more($more) {
       global $post;
	return ' <a href="'. get_permalink($post->ID) . '">'.__( 'Continue reading &rarr;', 'convention' ).'</a>';
}
add_filter('excerpt_more', 'convention_excerpt_more');

// Custom Password Form

add_filter( 'the_password_form', 'convention_password_form' );
locate_template( array( '/inc/password-form.php' ), true );

// Stylesheets

function convention_style() {
 wp_register_style('convention_css', get_stylesheet_uri(), array(), null, 'all'); 
 wp_enqueue_style('convention_css');	 
 
 if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}

add_action('wp_enqueue_scripts', 'convention_style');

// Sidebar

locate_template( array( '/inc/register-sidebar.php' ), true );

// Header Image

locate_template( array( '/inc/custom-header.php' ), true );

// Filter for Untitled Articles
        
add_filter('the_title', 'convention_title');
function convention_title($title) {
	if ( $title == '' ) {
		return __( 'Untitled', 'convention');
	} else {
		return $title;
	}
}

// Fields

function convention_fields($convention_fields) {
 $convention_fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name*', 'convention' ) . '</label></br><input id="author" name="author" type="text" value="" size="30" /></p>';

$convention_fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'E-Mail*', 'convention' ) . '</label></br> <input id="email" name="email" type="text" value="" size="30"/></p>';

$convention_fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'convention' ) . '</label></br><input id="url" name="url" type="text" value="" size="30" /></p>';

 return $convention_fields;
}

add_filter('comment_form_default_fields','convention_fields');


// Comment Form

function convention_comment($comment, $args, $depth) {

$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'div';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div class="comment">
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment-box">
		<div class="comment-name"><?php printf(__('%s', 'convention'), get_comment_author_link()) ?> </div>
		<div class="comment-date"><?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s', 'convention'), get_comment_date(),  get_comment_time()) ?></div>
				<div class="comment-line"></div>

		<div class="comment-text">
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'convention') ?></em></br>
		<?php endif; ?>
		
		<?php comment_text() ?>
		
		<div class="comment-reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link( __('Edit', 'convention'),'','' );
			?></div>
		</div></div></div></div>

				<?php if ( 'div' != $args['style'] ) : ?>
		</div><div style="clear:both;"></div>
		<?php endif; 
}

// Output Date of an Article

function convention_get_date() {
$date_format = get_option( 'date_format' );
the_time($date_format);
}

function convention_create_menu() {
   add_theme_page('Other Fimply Themes', 'Other Fimply Themes', 'edit_theme_options', 'fimplythemes', 'convention_other_themes');
}

add_action('admin_menu', 'convention_create_menu');

function convention_other_themes () {
	locate_template( array( '/inc/other-themes.php' ), true );
}

function convention_admin_enqueue() {
   wp_enqueue_style( 'admin_style', get_template_directory_uri() . '/css/options.css', array(), null, 'all' );
}

add_action( 'admin_enqueue_scripts', 'convention_admin_enqueue' );

 ?>