b2rPHP: Exception
=================

Common exceptions in my library

[![Build Status](https://travis-ci.org/b2r/php-exception.svg?branch=master)](https://travis-ci.org/b2r/php-exception)

- All exception implements `ExceptionInterface`
- All exception uses `ExceptionTrait`
- [CHANGELOG](CHANGELOG.md)

Exception classes
--------------------
- Exception
  - InvalidClassMemberException
    - InvalidMethodException
    - InvalidPropertyException
  - InvalidIndexException
  - InvalidTypeException
    - InvalidParameterTypeException
  - IOException
    - FileNotFoundException
    - DirectoryNotFoundException
  - NameException
- InvalidArgumentException
- LogicException
- RuntimeException

Utility/Helper classes
--------------------
- Utils:  Utility functions
- Finder: Lookup/resolve class name

InvalidTypeException sample
----------------------------------------
```php
use b2r\Component\Exception\InvalidTypeException;

$e = new InvalidTypeException('$key', 'string|int', []); // Variable name, Valid type, Invalid type value
echo $e->message; #=>"$key must be of the type `string|int`, but `array` given"
```

Finder sample
--------------------
Finder lookup/resolve class name easily.

```php
use b2r\Component\Exception\Finder as E;

$e = E::Type(); #=>'b2r\Component\Exception\InvalidTypeException'
throw new $e('name', 'string|int', null);
```
