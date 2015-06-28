<?php

error_reporting(E_ALL | E_STRICT);

require '../vendor/autoload.php';

// Load our dependencies
$container = require_once __DIR__.'/../bootstrap/dependencies.php';

// Run the imageRack server
$server = new Diarmuidie\ImageRack\Server(
    $container['source'],
    $container['cache'],
    $container['imageManager']
);

// Array of available templates with claaback to return a processor
// that implements Diarmuidie\ImageRack\Image\TemplateInterface
$server->setTemplate(
    'small',
    function () {
        return new Templates\Small();
    }
);

$server->setTemplate(
    'large',
    function () {
        return new Templates\Large();
    }
);

// Optionally set the not found response content
$server->setNotFound(function ($response) {
    return $response->setContent('Image not found.');
});

$server->run();
$server->send();
