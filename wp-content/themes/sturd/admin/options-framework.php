<?php
/*
You should have received a copy of the GNU General Public License
/* If the user can't edit theme options, no use running this plugin */
add_action( 'init', 'optionsframework_rolescheck' );
function optionsframework_rolescheck () {
/* Loads the file for option sanitization */
function optionsframework_load_sanitization() {
/*
function optionsframework_init() {
	// Optionally Loads the options file from the theme
	// Load settings
	// Updates the unique option id in the database if it has changed
	// If the developer hasn't explicitly set an option id, we'll use a default
	// If the option has no saved data, load the defaults
	// Registers the settings fields and callback
/**
function optionsframework_page_capability( $capability ) {
function optionsframework_setdefaults() {
	/* 
	} else {
	// Gets the default options data from the array in options.php
	// If the options haven't been added to the database yet, they are added now
/* Add a subpage called "Theme Options" to the appearance menu. */
		// Load the required CSS and javascript
}
/* Loads the CSS */
/* Loads the javascript */
	if ( 'appearance_page_options-framework' != $hook )
	// Enqueue custom option panel JS
function of_admin_head() {
/* 
	<div id="optionsframework-wrap" class="wrap">
/**
	/*
	$clean = array();
		// Set each item in the multicheck to false if it wasn't sent in the $_POST
		// For a value to be submitted to database it must pass through a sanitization filter
	// Hook to run after validation
/**
add_action( 'optionsframework_after_validate', 'optionsframework_save_options_notice' );
/**
 * Allows for manipulating or setting options via 'of_options' filter