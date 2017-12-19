<?php

namespace Awps;

/*
 * Direct Font Awesome Reader
 *
 * Get font awesome class names in an array or json format.
 *
 */
class FontAwesomeReader extends AbstractFontAwesome {

	/**
	 * FontAwesomeReader constructor.
	 *
	 * @param string $css_path THe full path to font-awesome.css
	 */
	public function __construct( $css_path ) {
		try {
			$the_array = $this->readCss( $css_path );
		} catch ( \Exception $e ) {
			echo $e->getMessage();
		}

		if ( ! empty( $the_array ) ) {
			$this->icons_array    = $the_array;
			$this->original_array = $the_array;
		}
	}

	/**
	 * Read the CSS file and return the array
	 *
	 * @param string $path         font awesome css file path
	 * @param string $class_prefix change this if the class names does not start with `fa-`
	 *
	 * @return array|bool
	 * @throws \Exception
	 */
	protected static function readCss( $path, $class_prefix = 'fa-' ) {
		//if path is incorrect or file does not exist, stop.
		if ( ! file_exists( $path ) ) {
			throw new \Exception( 'Can\'t read the CSS. File does not exists.' );
		}

		$css     = file_get_contents( $path );
		$pattern = '/\.(' . $class_prefix . '(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

		preg_match_all( $pattern, $css, $matches, PREG_SET_ORDER );

		$icons = array();
		foreach ( $matches as $match ) {
			$icons[ $match[1] ] = $match[2];
		}

		return $icons;
	}

}
