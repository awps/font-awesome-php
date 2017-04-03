Font Awesome data in PHP and JSON
==========================

This repository contains the necessary data to work with Font Awesome in PHP or JSON.

**Requirements:**
* Font Awesome 4.7
* PHP 5.3+ for `font-awesome.php`.
 
**License**
 * MIT - [Details](https://github.com/Smartik89/SMK-Font-Awesome-PHP-JSON/blob/master/LICENSE)

## How to use in PHP:

### Include the following file. It will give you acces to `smk_font_awesome` function:
```php
require( dirname(__DIR__) . '/font-awesome.php' );
```

Next you must use `smk_font_awesome` function, to get all icons or only specific ones from array. The following example demostrates how to access different info using this function.

### Get all icons:
```php
smk_font_awesome();

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

### Get human readable names:
```php
smk_font_awesome( 'readable' );

// array (
//   'fa-500px' => '500px',
//   'fa-address-book' => 'Address book',
//   'fa-address-book-o' => 'Address book o',
//   'fa-address-card' => 'Address card',
//   'fa-address-card-o' => 'Address card o',
//   ...
//  )
```

### Get unicodes:
```php
smk_font_awesome( 'unicode' );

// array (
//   'fa-500px' => '\\f26e',
//   'fa-address-book' => '\\f2b9',
//   'fa-address-book-o' => '\\f2ba',
//   'fa-address-card' => '\\f2bb',
//   'fa-address-card-o' => '\\f2bc',
//   ...
//  )
```

### Get a specific icon:
```php
smk_font_awesome( 'fa-star' );

// array (
//   'unicode' => '\\f005',
//   'name' => 'Star',
// )
```

### Get the name of a specific icon:
```php
smk_font_awesome( 'fa-star', 'name' );

// 'Star'
```

### Get the unicode of a specific icon:
```php
smk_font_awesome( 'fa-star', 'unicode' );

// '\f005'
```


## Advanced: The PHP class.
You probably don't need this. Using this class can be resource intensive, so you must run it only once and cache the data somewhere(in database, for example.).

```php
//Require the class
require(  dirname(__DIR__) . '/font-awesome.class.php' );

//Init the class
$fa = new Smk_FontAwesome;

//Get the array of of icons
$icons = $fa->getArray( dirname(__DIR__) . '/font-awesome/css/font-awesome.css');
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
$fa->allData($icons);      //All data, unicodes and human readable names
```

## JSON Example with jQuery.
See [`dev/test.html`](https://github.com/SMK-Toolkit/SMK-Font-Awesome-PHP-JSON/blob/master/font-awesome/dev/test.html) for examples.
```js
$.getJSON( "../font-awesome.json", function( data ) {
	var names = [];
	$.each( data, function( key, val ) {
		names.push( "<span><i class='fa " + key + "'></i> " + val.name + "</span>" );
	});

	$( "<div/>", {
	"class": "icons-readable",
	html: names.join( "" )
	}).appendTo( "body" );

});
```


## Notes:
If you still need access to old files you can access them from `deprecated` directory. They also include updated data, but it's not recommended to use them anymore since will be removed in the future.
