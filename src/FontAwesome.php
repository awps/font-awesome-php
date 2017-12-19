<?php

namespace Awps;

/*
 * Font Awesome
 *
 * Work with font awesome from static source
 *
 */
class FontAwesome extends AbstractFontAwesome {

	/**
	 * FontAwesome constructor.
	 */
	public function __construct() {
		$the_array = FontAwesomeStatic::data();

		if ( ! empty( $the_array ) ) {
			$this->icons_array    = $the_array;
			$this->original_array = $the_array;
		}
	}

}
