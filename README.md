Exception reporter for laravel-admin, fork from laravel-admin-extensions/reporter
======================

## Screenshot

![laravel-admin_exceptions](https://user-images.githubusercontent.com/1479100/30947042-0f667d9a-a43a-11e7-99c3-cf0fe236fedd.png)

## Installation 

1. 
```
$ composer require laravel-admin-reporter -vvv

$ php artisan vendor:publish --tag=laravel-admin-reporter

$ php artisan migrate --path=vendor/laravel-admin-reporter/database/migrations

```


2. 
Add Service Provider to config/app.php in providers section
```
Encore\Admin\Reporter\ReporterServiceProvider::class,
```

3. 
Admin add menu "exceptions"


Open `app/Exceptions/Handler.php`, call `Reporter::report()` inside `report` method:
```php
<?php

namespace App\Exceptions;

use Encore\Admin\Reporter\Reporter;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    ...

    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception)) {
            Reporter::report($exception);
        }

//        parent::report($exception);
    }
    
    ...

}
```

Open `http://localhost/admin/exceptions` to view exceptions.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
