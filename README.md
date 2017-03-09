SMK Font Awesome PHP, JSON
==========================

This repository contains the necessary data to work with Font Awesome in PHP or JSON.

**Requirements:**
* Font Awesome 4.7
* PHP 5.3+ for `font-awesome.php`.
 
**License**
 * MIT - [Details](https://github.com/Smartik89/SMK-Font-Awesome-PHP-JSON/blob/master/LICENSE)

##How to use in PHP:

###Include the following file. It will give you acces to `smk_font_awesome` function:
```php
require( dirname(__DIR__) . '/font-awesome.php' );
```

Next you must use `smk_font_awesome` function, to get all icons or only specific ones from array. The following example demostrates how to access different info using this function.

### Get all icons:
```php
$icons = smk_font_awesome();

// array (
//   'fa-500px' => array (
//     'unicode' => '\\f26e',
//     'name' => '500px',
//   ),
//   'fa-address-book' =>  array (
//     'unicode' => '\\f2b9',
//     'name' => 'Address book',
//   ),
//   ...
//  )
```


##Advanced: The PHP class.

```php
//Require class
require( PATH . '/font-awesome.class.php' );

//Init font awesome class
$fa = new Smk_FontAwesome;

//Get array
$icons = $fa->getArray(PATH . '/font-awesome/css/font-awesome.css');
```

`$icons` variable now contains all FA class names in an array.

`$icons` output:
```php
array(
//...
'fa-calendar' => '\f073',
//...
)
```

**Manipulate the `$icons`:**

```php
$fa->sortByName($icons);   //Sort by key name. Alphabetically sort: from a to z
$fa->onlyClass($icons);    //Only HTML class, no unicode. 'fa-calendar' => 'fa-calendar',
$fa->onlyUnicode($icons);  //Only unicode, no HTML class. '\f073' => '\f073',
$fa->readableName($icons); //Only HTML class, readable. 'fa-video-camera' => 'Video Camera',
```

##JSON Example with jQuery.
See [`dev/test.html`](https://github.com/SMK-Toolkit/SMK-Font-Awesome-PHP-JSON/blob/master/font-awesome/dev/test.html) for examples.
```js
$.getJSON( "../font-awesome-data.json", function( data ) {
	var items = [];
	$.each( data, function( key, val ) {
		items.push( "<i class='fa " + key + "'></i> " );
	});

	$( "<div/>", {
	"class": "icons",
	html: items.join( "" )
	}).appendTo( "body" );

});
```
