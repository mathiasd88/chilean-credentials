## Framework Agnostic Chilean Credentials Package

[![Build Status](https://travis-ci.org/mathiasd88/chilean-credentials.svg?branch=master)](https://travis-ci.org/mathiasd88/chilean-credentials)

A Chilean RUT credentials package for PHP 5.6+.

## Installation

Require this package with composer:

```
composer require mathiasd88/chilean-credentials
```

Then use the class wherever you want using:

```
use Mathiasd88\ChileanCredentials\Rut;
```

## Usage

#### Examples:

If you want to validate a rut:

```php
return (new Rut('15082666', '7'))->isValid(); // returns true
```

```php
return (new Rut('15082666', 'K'))->isValid(); // returns false
```

If you want to get the "digito verificador" of a given rut:

```php
return (new Rut('15082666'))->dv(); // returns 7
```

If you want to create a valid rut:

```php
return new Rut(); // returns a valid rut, for example: '23932394-4'
```

### Tests

You can run all the tests using phpunit.

```
vendor/phpunit/phpunit/phpunit tests --colors
```
