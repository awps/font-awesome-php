SMK Font Awesome PHP, JSON
==========================

This repository contains the necessary data to work with Font Awesome in PHP or JSON.

##How to use:

You have multiple options:
* use static data from files that start with `font-awesome-data...` php or json. Recomended if you just need the class names and nothing more. It's suitable for everyone.
* use the PHP class to dynamically generate the array. - `font-awesome.class.php`. Recomended only if you cache the result and save it in a static file or Database. Advanced users.

**Note:** *Replace `PATH` with a real constant or variable defined in your application. For example: `dirname(__FILE__)`*

##Basic: Static data.

Default data:
```php
require( PATH . '/font-awesome-data.php' );
$icons = smk_font_awesome();//The array
```

Readable class names
```php
require( PATH . '/font-awesome-data-readable.php' );
$icons = smk_font_awesome();//The array
```

Serialized data may not be useful, but in some cases, for example if you want to import data in a database it may be the only file that you'll need.
```php
$icons = file_get_contents(PATH . '/font-awesome-data-serialized.php');
$icons = unserialize($icons);//The array
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

