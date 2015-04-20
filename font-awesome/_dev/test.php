<?php
/* 
 * Test font awesome
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-05-17 12:33:47
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-05-17 20:52:05
 *
 */
if( !function_exists('smk_print') ){
	function smk_print($array, $title = ''){
		if( !empty($title) ) {
			echo '<strong>'. $title .'</strong><br>';
		}
		echo '<pre>';
			if( is_array($array) ){
				print_r($array);
			}
		echo '</pre>';
	}
}
if( !function_exists('total') ){
	function total($array){
		if( is_array($array) ){
			$total = count($array);
			echo '<h3>Total: ' . $total .'</h3>';
		}
	}
}

//Start test
require( dirname(__DIR__) . '/font-awesome.class.php' );

//Init font awesome
$fa = new Smk_FontAwesome;
$css_path = dirname(__FILE__) . '/font-awesome/css/font-awesome.css';

$icons = $fa->getArray($css_path);

//Total icons
total($icons);

smk_print( $icons, 'Basic:' );
smk_print( $fa->sortByName($icons), 'Sort by key name:' );
smk_print( $fa->onlyClass($icons), 'Only HTML class, no unicode:' );
smk_print( $fa->onlyUnicode($icons), 'Only unicode, no HTML class:' );
smk_print( $fa->readableName($icons), 'Only HTML class, readable:' );

$test_fail = $fa->getArray($css_path, 'fail-');
smk_print( $fa->readableName($test_fail), 'This test should fail(empty array):' );