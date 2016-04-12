# Filesystem itererators

[![Author](http://img.shields.io/badge/author-iwyg-blue.svg?style=flat-square)](https://github.com/iwyg)
[![Source Code](http://img.shields.io/badge/source-thapp/fileitr-blue.svg?style=flat-square)](https://github.com/iwyg/fileitr/tree/master)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/iwyg/fileitr/blob/master/LICENSE.md)

[![Build Status](https://img.shields.io/travis/iwyg/fileitr/master.svg?style=flat-square)](https://travis-ci.org/iwyg/fileitr)
[![Code Coverage](https://img.shields.io/coveralls/iwyg/fileitr/master.svg?style=flat-square)](https://coveralls.io/r/iwyg/fileitr)
[![HHVM](https://img.shields.io/hhvm/thapp/fileitr/dev-master.svg?style=flat-square)](http://hhvm.h4cc.de/package/thapp/fileitr)

## Requirements

```bash
php >= 5.6
```

## Installation
```bash
> composer require thapp/fileitr
```


## Usage

### PatternIterator

`PatternIterator` is used to recursively iterate over directories and files using
a regular expression as filter.

```php
<?php
use Thapp\Fileitr\PatternIterator;

// iterates over a maximum directory depth of 2, searching for files with a '.php' usffix
$itr = new PatternIterator($path, '/\.(php)$/', 2, -1, $flags);

// iterates over a maximum directory depth of 1, and limits overall files to 3.
$itr = new PatternIterator($path, '/\.(php)$/', 1, 3, $flags);
```

### RecursiveDirectoryIterator

The `RecursiveDirectoryIterator` extends `\RecursiveDirectoryIterator`.

Key differences:

- ability to limit overall file count. 
- will ouput a custom FileInfo Object including relative path, and relative pathname 
- only accepts `CURRENT_AS_FILEINFO`, not `CURRENT_AS_SELF` nor `CURRENT_AS_PATHNAME`
