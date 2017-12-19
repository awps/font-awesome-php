<?php
function awps_load_font_awesome( $class ) {
	// does the class use the namespace prefix?
	$len = strlen( 'Awps\\' );
	if ( strncmp( 'Awps\\', $class, $len ) !== 0 ) {
		// no, move to the next registered loader
		return;
	}

	// get the relative class name
	$relative_class = substr( $class, $len );

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = realpath( __DIR__ ) . '/' . str_replace( '\\', '/', $relative_class ) . '.php';

	// if the file exists, require it
	if ( file_exists( $file ) ) {
		require_once $file;
	}
}

spl_autoload_register( 'awps_load_font_awesome' );
