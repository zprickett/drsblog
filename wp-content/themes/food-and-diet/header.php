<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include_once("analyticstracking.php") ?>
<header id="masthead" class="site-header" role="banner">
        <?php// echo fd_theme_options( 'logo' ); ?>

        <!-- #site-navigation -->
        <?php 
            $header_background = fd_theme_options('header_background'); 
        ?>
        <hgroup class="clear" <?php print $header_background; ?> >
            <h1>DataReSource Information Center</h1>
            <p>Below is a list or relevant oil and gas data articles by DataReSource.</p>
        </hgroup>   
        
        
        <div class="clear"></div>
</header><!-- #masthead -->
<div id="page" class="hfeed site">
    <span class="home-link">
        <a href="www.dataresource.com.au">Home Page</a>
    </span>
	<div id="main" class="wrapper">