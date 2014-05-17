<?php
/* 
 * Generate
 *
 * Generate static files. Dev only.
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * @Project URI: https://github.com/SMK-Toolkit/SMK-Font-Awesome-PHP-JSON
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-05-17 16:33:35
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-05-18 00:10:08
 *
 */

$gen_start = microtime(true);

if( ! function_exists('smk_saveToFile') ){
	function smk_saveToFile($path, $data){
		if( file_put_contents($path, $data) ){
			echo '<span style="color:green">Success</span> - ' . basename($path) . '<br>';
		}
		else{
			echo '<span style="color:red">Fail</span> - ' . basename($path) . '<br>';
		}
	}
}
$put_header = "/**\r\n * Font awesome\r\n * Last edit: ". gmdate("Y-d-m H:i:s") ."\r\n * Author: Smartik\r\n * Project URI: https://github.com/SMK-Toolkit/SMK-Font-Awesome-PHP-JSON\r\n */\r\n";

require( dirname(__DIR__) . '/font-awesome.class.php' );

$fa = new Smk_FontAwesome;
$css_path = dirname(__FILE__) . '/font-awesome/css/font-awesome.css';

if( ! file_exists($css_path) )
	die('CSS file does not exist! The path may be incorect.');

$fa_array = $fa->getArray($css_path);
$icons = $fa->sortByName($fa_array);
$readableNames = $fa->readableName($icons);

//Serialized
$serialized = serialize($icons);
smk_saveToFile(dirname(__DIR__) . '/font-awesome-data-serialized.php', $serialized);

//JSON
$json = (version_compare(PHP_VERSION, '5.4') >= 0) ? json_encode($icons, JSON_PRETTY_PRINT) : json_encode($icons, true);
smk_saveToFile(dirname(__DIR__) . '/font-awesome-data.json', $json);

//JSON Readable
$json = (version_compare(PHP_VERSION, '5.4') >= 0) ? json_encode($readableNames, JSON_PRETTY_PRINT) : json_encode($readableNames, true);
smk_saveToFile(dirname(__DIR__) . '/font-awesome-data-readable.json', $json);

//PHP function
$phpfn = "<?php\r\n";
$phpfn .= $put_header;
$phpfn .= "if( ! function_exists('smk_font_awesome'){\r\n";
$phpfn .= "function smk_font_awesome(){\r\n";
$phpfn .= "\treturn array(\r\n";
foreach ($icons as $key => $value) {
	$phpfn .= "\t\t'". $key ."' => '". $value ."',\r\n";
}
$phpfn .= "\t);\r\n";
$phpfn .= "}\r\n";
$phpfn .= "}\r\n";
smk_saveToFile(dirname(__DIR__) . '/font-awesome-data.php', $phpfn);

//PHP function classes
$phpfn = "<?php\r\n";
$phpfn .= $put_header;
$phpfn .= "if( ! function_exists('smk_font_awesome'){\r\n";
$phpfn .= "function smk_font_awesome(){\r\n";
$phpfn .= "\treturn array(\r\n";
foreach ($readableNames as $key => $value) {
	$phpfn .= "\t\t'". $key ."' => '". $value ."',\r\n";
}
$phpfn .= "\t);\r\n";
$phpfn .= "}\r\n";
$phpfn .= "}\r\n";
smk_saveToFile(dirname(__DIR__) . '/font-awesome-data-readable.php', $phpfn);

$gen_end = microtime(true);
$generated = $gen_end - $gen_start;
echo 'Completed in: <strong>' . $generated .'</strong> seconds';