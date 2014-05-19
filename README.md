SMK Font Awesome PHP, JSON
==========================

This repository contains the necesarry data to work with Font Awesome in PHP or JSON.

##How to use:

You have multiple options:
* use the PHP class to dynamically generate the array. - `font-awesome.class.php`. Recomended only if you cache the result and save it in a static file or Database. Advanced users.
* use static data from files that start with `font-awesome-data...` php or json. Recomended if you just need the class names and nothing more. It's suitable for everyone.

**Note:** *Replace `PATH` with a real constant or variable defined in your application. For example: `dirname(__FILE__)`*

###The PHP class:
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
$fa->sortByName($icons); //Sort by key name. Alphabetically sort: from a to z
$fa->onlyClass($icons); //Only HTML class, no unicode. 'fa-calendar' => 'fa-calendar',
$fa->onlyUnicode($icons); //Only unicode, no HTML class. '\f073' => '\f073',
$fa->readableName($icons); //Only HTML class, readable. 'fa-video-camera' => 'Video Camera',
```


