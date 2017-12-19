<?php
ob_start();
if ( ! function_exists( 'dd' ) ) {
	function dd( $array, $title = '' ) {
		if ( ! empty( $title ) ) {
			echo '<h4>' . $title . '</h4>';
		}
		echo '<pre>';
		print_r( var_export( $array ) );
		echo '</pre>';
	}
}

/*
-------------------------------------------------------------------------------
Testing
-------------------------------------------------------------------------------
*/
require( dirname( __DIR__ ) . '/src/load.php' );

echo '<div class="column"><h1>Static</h1>';
echo '<div><code>$icons = new Awps\FontAwesome()</code></div>';

$icons = new Awps\FontAwesome();

dd( $icons->total(), 'total: Total:' );
dd( $icons->getArray(), 'getArray: Get the array:' );
dd( $icons->getAllData(), 'getAllData: All data:' );
dd( $icons->getCssClasses(), 'getCssClasses: The HTML class:' );
dd( $icons->getUnicodeKeys(), 'getUnicodeKeys: The unicode:' );
dd( $icons->getReadableNames(), 'getReadableNames: The HTML class and readable name:' );
dd( $icons->sortByName(), 'sortByName: Sort by key name:' );
dd( $icons->getIconUnicode( 'fa-envelope-o' ), 'getIconUnicode: for fa-envelope-o' );
dd( $icons->getIconName( 'fa-envelope-o' ), 'getIconName: for fa-envelope-o' );
dd( $icons->getIcon( 'fa-address-card' ), 'getIcon: for fa-address-card' );
dd( $icons->getIconByUnicode( '\\f004' ), 'getIconByUnicode: for \\f004' );

echo '<h3>Utilities</h3>';

dd( $icons->sortByName(), 'sortByName:' );
dd( $icons->getArray(), 'getArray: Should return sorted' );

echo '<h3>Reseting the array to original using <code>->reset()</code></h3>';
$icons->reset();
dd( $icons->getArray(), 'getArray: Should return original array' );

echo '</div>';
echo '<div class="column"><h1>Reader</h1>';
echo '<div><code>$icons = new Awps\FontAwesomeReader( $css_path )</code></div>';

$css_path = dirname( __DIR__ ) . '/node_modules/font-awesome/css/font-awesome.css';
$icons    = new Awps\FontAwesomeReader( $css_path );

dd( $icons->total(), 'total: Total:' );
dd( $icons->getArray(), 'getArray: Get the array:' );
dd( $icons->getAllData(), 'getAllData: All data:' );
dd( $icons->getCssClasses(), 'getCssClasses: The HTML class:' );
dd( $icons->getUnicodeKeys(), 'getUnicodeKeys: The unicode:' );
dd( $icons->getReadableNames(), 'getReadableNames: The HTML class and readable name:' );
dd( $icons->sortByName(), 'sortByName: Sort by key name:' );
dd( $icons->getIconUnicode( 'fa-envelope-o' ), 'getIconUnicode: for fa-envelope-o' );
dd( $icons->getIconName( 'fa-envelope-o' ), 'getIconName: for fa-envelope-o' );
dd( $icons->getIcon( 'fa-address-card' ), 'getIcon: for fa-address-card' );
dd( $icons->getIconByUnicode( '\\f004' ), 'getIconByUnicode: for \\f004' );

echo '<h3>Utilities</h3>';
dd( $icons->sortByName(), 'sortByName:' );
dd( $icons->getArray(), 'getArray: Should return sorted' );

echo '<h3>Reseting the array to original using <code>->reset()</code></h3>';
$icons->reset();
dd( $icons->getArray(), 'getArray: Should return original array' );

echo '</div>';


$content = ob_get_clean();
?>

<html>
<head>
    <title>Test</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }

        .container {
            padding: 0;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }

        .column {
            display: inline-block;
            float: left;
            width: 50%;
            padding: 5px;
        }

        pre {
            width: 100%;
            height: auto;
            max-height: 130px;
            overflow: auto;
            margin: 5px 0 25px;
            border: 1px solid #999999;
            padding: 15px;
        }

        code {
            padding: 5px;
            background: #eee;
            border-radius: 3px;
        }

        h4 {
            margin: 20px 5px 10px;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container">
	<?php
	echo $content;
	?>
</div>
</body>
</html>
