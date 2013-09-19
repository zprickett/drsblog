<?php
/** Loads the Contango theme setting. */
function contango_get_settings() {
	global $contango;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $contango->settings ) ) {
		$contango->settings = get_option( 'contango_options' );
	}
	
	/** return settings. */
	return $contango->settings;
}