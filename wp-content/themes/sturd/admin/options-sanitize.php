<?php
function of_sanitize_checkbox( $input ) {
/* Multicheck */
/* Editor */
add_filter( 'of_sanitize_info', 'of_sanitize_allowedposttags' );
/* Typography */
add_filter( 'of_sanitize_typography', 'of_sanitize_typography', 10, 2 );
function of_sanitize_font_face( $value ) {
add_filter( 'of_font_face', 'of_sanitize_font_face' );
/**
 * Get recognized background repeat settings
/**
 * Get recognized background positions
/**
 * Get recognized font sizes.
/**
/**
/**
 * Is a given string a color formatted in hexidecimal notation?
function of_validate_hex( $hex ) {