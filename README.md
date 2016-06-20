## Laravel Chilean Credentials

[![Build Status](https://travis-ci.org/mathiasd88/chilean-credentials.svg?branch=master)](https://travis-ci.org/mathiasd88/chilean-credentials)

A Chilean RUT credentials package for PHP.

## Installation

Require this package with composer:

```
composer require mathiasd88/chilean-credentials
```

After updating composer, add the ServiceProvider to the providers array in config/app.php

### Laravel 5.x:

```
Mathiasd88\ChileanCredentials\ChileanCredentialsServiceProvider::class,
```

If you want to use the facade, add this to your facades in app.php:

```
'Rut' => Mathiasd88\ChileanCredentials\Facades\Rut::class,
```

## Usage

#### Examples:

If you want to validate a rut:

```php
return Rut::validate('15082666-7'); // returns true
```

```php
return Rut::validate('15082666-K'); // returns false
```

If you want to get the "digito verificador" of a given rut:

```php
return Rut::getDv('15082666'); // returns 7
```

If you want to create a valid rut:

```php
return Rut::createRandom(); // returns a valid rut, for example: '23932394-4'
```

### Tests

You can run all the tests using phpspec.

```
vendor/bin/phpspec run
```
