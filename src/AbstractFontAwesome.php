<?php

namespace Awps;

abstract class AbstractFontAwesome {

	/**
	 * @var array|bool $icons_array
	 */
	protected $icons_array = false;

	/**
	 * @var array|bool $original_array
	 */
	protected $original_array = false;

	/**
	 * Sort array by key name
	 *
	 * @return array|bool
	 */
	public function sortByName() {
		if ( is_array( $this->icons_array ) ) {
			ksort( $this->icons_array );
		}

		return $this->icons_array;
	}

	/**
	 * Get the icons array.
	 *
	 * @return array|bool
	 */
	public function getArray() {
		return $this->icons_array;
	}

	/**
	 * Count the total number of icons
	 *
	 * @return int
	 */
	public function total() {
		return count( $this->icons_array );
	}

	/**
	 * Reset the array to its original state
	 *
	 * @return void
	 */
	public function reset() {
		$this->icons_array = $this->original_array;
	}

	/**
	 * Get only HTML class key(class) => value(class)
	 *
	 * @return array|bool
	 */
	public function getCssClasses() {
		$the_array = $this->icons_array;

		if ( is_array( $the_array ) ) {
			$temp = array();

			foreach ( $the_array as $class => $unicode ) {
				$temp[ $class ] = $class;
			}

			$the_array = $temp;
		}

		return $the_array;
	}

	/**
	 * Get only the unicode keys
	 *
	 * @return array|bool
	 */
	public function getUnicodeKeys() {
		$the_array = $this->icons_array;

		if ( is_array( $the_array ) ) {
			$temp = array();

			foreach ( $the_array as $class => $unicode ) {
				$temp[ $class ] = $unicode;
			}

			$the_array = $temp;
		}

		return $the_array;
	}

	/**
	 * Readable class name. Ex: fa-video-camera => Video Camera
	 *
	 * @return array|bool
	 */
	public function getReadableNames() {
		$the_array = $this->icons_array;

		if ( is_array( $the_array ) ) {
			$temp = array();

			foreach ( $the_array as $class => $unicode ) {
				$temp[ $class ] = $this->generateName( $class );
			}

			$the_array = $temp;
		}

		return $the_array;

	}

	/**
	 * Generate a readable name from icon class.
	 *
	 * @param string $icon_class
	 *
	 * @return string
	 */
	protected function generateName( $icon_class ) {
		$icon_class = $this->normalizeIconClass( $icon_class );

		return ucfirst(
			str_ireplace(
				array( 'fa-', '-' ),
				array( '', ' ' ),
				$icon_class
			)
		);
	}

	/**
	 * Make sure to have a class that starts with `fa-`.
	 *
	 * @param string $icon_class
	 *
	 * @return string
	 */
	protected function normalizeIconClass( $icon_class ) {
		$icon_class = trim( $icon_class );

		if ( stripos( $icon_class, 'fa-' ) === false ) {
			$icon_class = 'fa-' . $icon_class;
		}

		return $icon_class;
	}

	/**
	 * Make sure to keep only one single backslash or add it if needed.
	 *
	 * @param string $unicode
	 *
	 * @return string
	 */
	protected function normalizeUnicode( $unicode ) {
		return '\\' . str_replace( '\\', '', trim( $unicode ) );
	}

	/**
	 * Get all icons data. Ex: fa-video-camera => array(...)
	 *
	 * @return array|bool
	 */
	public function getAllData() {
		$the_array = $this->icons_array;

		if ( is_array( $the_array ) ) {
			$temp = array();

			foreach ( $the_array as $class => $unicode ) {
				$temp[ $class ] = array(
					'unicode' => $unicode,
					'name'    => $this->generateName( $class ),
					'class'   => $class,
				);
			}

			$the_array = $temp;
		}

		return $the_array;
	}

	/**
	 * Get the unicode by icon class.
	 *
	 * @param string|bool $icon_class
	 *
	 * @return bool|string
	 */
	public function getIconUnicode( $icon_class ) {
		$icon_class = $this->normalizeIconClass( $icon_class );
		$result     = false;

		if ( ! empty( $this->icons_array ) && array_key_exists( $icon_class, $this->icons_array ) ) {
			$result = $this->icons_array[ $icon_class ];
		}

		return $result;
	}

	/**
	 * Get the readable name by icon class.
	 *
	 * @param string|bool $icon_class
	 *
	 * @return bool|string
	 */
	public function getIconName( $icon_class ) {
		$icon_class = $this->normalizeIconClass( $icon_class );
		$result     = false;

		if ( ! empty( $this->icons_array ) && array_key_exists( $icon_class, $this->icons_array ) ) {
			$result = $this->generateName( $icon_class );
		}

		return $result;
	}

	/**
	 * Get icon data by icon class.
	 *
	 * @param string|bool $icon_class
	 *
	 * @return bool|string
	 */
	public function getIcon( $icon_class ) {
		$icon_class = $this->normalizeIconClass( $icon_class );
		$result     = false;

		$icons = $this->getAllData();

		if ( ! empty( $icons ) && array_key_exists( $icon_class, $icons ) ) {
			$result = $icons[ $icon_class ];
		}

		return $result;
	}

	/**
	 * Get icon data by unicode.
	 *
	 * @param string|bool $unicode
	 *
	 * @return bool|string
	 */
	public function getIconByUnicode( $unicode ) {
		$unicode = $this->normalizeUnicode( $unicode );
		$result  = false;

		$the_key = array_search( $unicode, $this->icons_array );

		if ( ! empty( $the_key ) ) {
			$result = $this->getIcon( $the_key );
		}

		return $result;
	}

}
