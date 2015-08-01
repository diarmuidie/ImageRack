ImageRack
=========

> Project repo for the [ImageRack PHP lib](https://github.com/diarmuidie/ImageRack-Kernel). Simple PHP image processor and server. Work in Progress.

Developed by [Diarmuid](https://diarmuid.ie).

[![Build Status](https://travis-ci.org/diarmuidie/ImageRack-Kernel.svg?branch=master)](https://travis-ci.org/diarmuidie/ImageRack-Kernel)
[![Coverage Status](https://coveralls.io/repos/diarmuidie/ImageRack-Kernel/badge.svg?branch=master)](https://coveralls.io/r/diarmuidie/ImageRack-Kernel?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/36f9f8f8-3c75-4942-a106-c98bee268ad5/mini.png)](https://insight.sensiolabs.com/projects/36f9f8f8-3c75-4942-a106-c98bee268ad5)

Features
--------

- Resizes images on the fly based on predefined user templates.
- Uses the [Intervention image manipulation library](https://github.com/Intervention/image).
- Integrates with Local or remote image stores using the [PHP League Flysystem](http://flysystem.thephpleague.com/) filesystem extraction library.
- Ability to cache processed images so that subsequent requests are served quickly.
- SEO friendly and easy to use URLs i.e. `example.com/<template>/path/to/source/image.png`.
- Supports PNG/JPEG/GIF images.

Usage
-----

To start a new project use the composer `create-project` command to install the ImageRack package in a named folder:

```
composer create-project diarmuidie/imagerack <folder-name>
```

Setup your browser to send all requests to `public/index.php`. 

Once the package is installed you can edit the contents of:

- `public/index.php` The main file that all requests are handled by.
- `bootstrap/dependencies.local.sample.php` Where the Flysystem and Intervention Image dependencies are configured.
- `templates/` Where your templates for resizing media will be stored.

### Configuration
ImageRack allows you to configure the server in a number of ways:

#### Templates
Templates are objects that define how an image should be manipulated. You can create as many of your own templates. Tmeplates must implement the [Diarmuidie\ImageRack\Image\TemplateInterface](https://github.com/diarmuidie/ImageRack-Kernel/blob/master/src/Image/TemplateInterface.php) interface. There is a [sample template](https://github.com/diarmuidie/ImageRack/blob/master/templates/Small.php) provided with ImageRack for resizing images to 320×240px.

After you create a new template it must be registered in the server:

```php
$server->setTemplate(
    'large',
    function () {
        return new Templates\Large();
    }
);
```

#### Not Found Response
You can set an optional "not found" response. By default a 404 header will be sent with the body "File not found". However this can be changed using the `setNotFound()` method:

```php
$server->setNotFound(function ($response) {

    // Edit the response as required
    $response->setContent('Image not found.');

    // Return the new response
    return $response;

});
```

`$response` is an instance of `Symfony\Component\HttpFoundation\Response`. See the [Symfony HTTP-Foundation docs](http://symfony.com/doc/current/components/http_foundation/introduction.html#response) for more info on what you can do with the response.


#### Error Response
You can set an optional "error" response. By default a 500 header will be sent with the body "There has been a problem serving this request". However this can be changed using the `setError()` method:

```php
$server->setNotFound(function ($response, $exception) {

    // Edit the response as required
    $response->setContent('An internal error occured. ' . $exception->getMessage());

    // Return the new response
    return $response;

});
```

`$exception` is an instance of the caught exception.

`$response` is an instance of `Symfony\Component\HttpFoundation\Response`. See the [Symfony HTTP-Foundation docs](http://symfony.com/doc/current/components/http_foundation/introduction.html#response) for more info on what you can do with the response.


### Single Server Setup
A single server deploy is the most straight forward configuration. Source images must be stored in the `storage/source` folder. Resized images will be cached in `storage/cache`.


### Multi-Server Setup
To use the ImageRack server in a multi-server environment (i.e. more than one web servers sitting behind a load ballancer) you must store the source and cache images in a distributed filesystem.

ImageRack comes with a sample configuration for using AWS S3 for this. To use this configuration you must make sure the Flysystem S3 adapter is installed:

```
composer require league/flysystem-aws-s3-v3
```

Then you can edit `public/index.php` to load the sample S3 dependencies:

```php
$dependencies = require_once __DIR__.'/../bootstrap/dependencies.s3.sample.php';
```

You will also have to change the `bootstrap/dependencies.s3.sample.php` file to use your S3 Secret and Key and change the bucket names.

Changelog
---------

### Version 0.1 (29 March 2015)

- Initial commit.


Authors
-------

- [Diarmuid](https://diarmuid.ie)


License
-------

The MIT License (MIT)

Copyright (c) 2015 Diarmuid

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
