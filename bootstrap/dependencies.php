<?php

use Pimple\Container;

use Diarmuidie\ImageRack\Config;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;

use Intervention\Image\ImageManager;

use Monolog\Logger;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\FingersCrossedHandler;

use Monolog\ErrorHandler;

use Diarmuidie\ImageRack\Http\Request;

use Diarmuidie\ImageRack\Http\Response;

$container = new Container();

// The source image filesystem
$container['source'] = function ($c) {
    return new Filesystem(new Adapter(__DIR__.'/../storage/source'));
};

// The cache image filesystem
$container['cache'] = function ($c) {
    return new Filesystem(new Adapter(__DIR__.'/../storage/cache'));
};

$container['imageManager'] = function ($c) {
    // create an image manager instance with favored driver
    return new ImageManager();
};

// Whoops error page
$container['errorPage'] = function ($c) {
    $whoops = new Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    return $whoops;
};

// Logger
$container['logger'] = function ($c) {
    $log = new Logger('ImageRack');
    $errorHandler = new ErrorLogHandler(ErrorLogHandler::OPERATING_SYSTEM, Logger::DEBUG);
    $log->pushHandler(new FingersCrossedHandler($errorHandler, Logger::DEBUG));
    return $log;
};

// Error handler
$container['errorHandler'] = function ($c) {
    return new ErrorHandler($c['logger']);
};

// Request object
$container['request'] = function ($c) {
    $request = new Request($_SERVER['REQUEST_URI']);
    return $request;
};

// Response object
$container['response'] = function ($c) {
    $response = new Response();
    return $response;
};

// Register global error handler
$container['errorHandler']->registerErrorHandler();

// Register the error pages
$container['errorPage']->register();

return $container;
