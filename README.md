A PHP library for Font Awesome.
==========================

This repository contains the necessary data to work with Font Awesome in PHP.

**Requirements:**
* Font Awesome 4.7.0
* PHP 5.3+.
* http://zerowp.com
 
**License**
 * MIT - [Details](https://github.com/awps/font-awesome-php/blob/master/LICENSE)

### Installation
#### With composer:

```php
composer require awps/font-awesome-php
```

#### Manually:
```php
require_once 'src/load.php';
```

### Usage

The library contains 2 main classes that are created for public:
* `Awps\FontAwesome()` - Uses a static array of FA icons.(Recommended)
* `Awps\FontAwesomeReader( $css_path )` - Generates the array from `font-awesome.css` file. You must define the path to this file.

Create an instance:
```php
// Using the reader to dinamically get the icons array. It's resource intensive and you must cache the result.
$css_path = __DIR__ . '/css/font-awesome.css';
$icons    = new Awps\FontAwesomeReader( $css_path );

// .... or better use the static class
$icons = new Awps\FontAwesomeReader();
```

Next it's easy. You can get the array of icons just by doing this.
```php
$icons->getArray();

// Result:
/*
array (
  'fa-glass' => '\\f000',
  'fa-music' => '\\f001',
  'fa-search' => '\\f002',
  ...
*/
```

### API:

#### `->getAllData()`
```php
$icons->getAllData();

// Result:
/*
array (
  'fa-glass' => 
  array (
    'unicode' => '\\f000',
    'name' => 'Glass',
    'class' => 'fa-glass',
  ),
  'fa-music' => 
  array (
    'unicode' => '\\f001',
    'name' => 'Music',
    'class' => 'fa-music',
  ),
  ...
*/
```

#### `->getCssClasses()`
```php
$icons->getCssClasses();

// Result:
/*
array (
  'fa-glass' => 'fa-glass',
  'fa-music' => 'fa-music',
  'fa-search' => 'fa-search',
  ...
*/
```

#### `->getUnicodeKeys()`
```php
$icons->getUnicodeKeys();

// Result:
/*
array (
  'fa-glass' => '\\f000',
  'fa-music' => '\\f001',
  'fa-search' => '\\f002',
  'fa-envelope-o' => '\\f003',
  ...
*/
```

#### `->getReadableNames()`
```php
$icons->getReadableNames();

// Result:
/*
array (
  'fa-glass' => 'Glass',
  'fa-music' => 'Music',
  'fa-search' => 'Search',
  ...
*/
```

#### `->sortByName()`
Attention: This modifies the original array. You can reset it back using `->reset()` method.
```php
$icons->sortByName();

// Result:
/*
array (
  'fa-500px' => '\\f26e',
  'fa-address-book' => '\\f2b9',
  'fa-address-book-o' => '\\f2ba',
  'fa-address-card' => '\\f2bb',
  'fa-address-card-o' => '\\f2bc',
  'fa-adjust' => '\\f042',
  ...
*/
```

#### Utilities:
#### `->total()`
Return the total number of icons from original array.

#### `->getIconUnicode( $icon_class )`
Get the unicode by icon class.

Example:
```php
$icons->getIconUnicode( 'fa-address-card' );

// Result
// '\f2bb'
```

#### `->getIconName( $icon_class )`
Get the readable icon name by class.

Example:
```php
$icons->getIconName( 'fa-address-card' );

// Result
// 'Address card'
```

#### `->getIcon( $icon_class )`
Get the details of a single icon by class.

Example:
```php
$icons->getIcon( 'fa-address-card' );

// Result
/*
array (
  'unicode' => '\\f2bb',
  'name' => 'Address card',
  'class' => 'fa-address-card',
)
*/
```

#### `->getIconByUnicode( $unicode )`
Get the details of a single icon by unicode.

Example:
```php
$icons->getIconByUnicode( '\\f004' )

// Result
/*
array (
  'unicode' => '\\f004',
  'name' => 'Heart',
  'class' => 'fa-heart',
)
*/
```

#### `->reset()`
Reset the current array to its original state

Example:
```php
$icons->sortByName();

// Array is sorted:
$icons->getArray();

/*
array (
  'fa-500px' => '\\f26e',
  'fa-address-book' => '\\f2b9',
  'fa-address-book-o' => '\\f2ba',
  'fa-address-card' => '\\f2bb',
  ...
);
*/

// Reset it
$icons->reset();

// This one will return the original array
$icons->getArray();

// Result:
/*
array (
  'fa-glass' => '\\f000',
  'fa-music' => '\\f001',
  'fa-search' => '\\f002',
  ...
);
*/
```
