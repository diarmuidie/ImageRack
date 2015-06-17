<?php

use Pimple\Container;

use Diarmuidie\ImageRack\Config;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;

use Intervention\Image\ImageManager;

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

// The Intervention image manager instance
$container['imageManager'] = function ($c) {
    return new ImageManager();
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

return $container;
