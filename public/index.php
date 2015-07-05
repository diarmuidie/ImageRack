<?php

require '../vendor/autoload.php';

// Load our dependencies
$dependencies = require_once __DIR__.'/../bootstrap/dependencies.local.sample.php';

// Run the imageRack server
$server = new Diarmuidie\ImageRack\Server(
    $dependencies['source'],
    $dependencies['cache'],
    $dependencies['imageManager']
);

// Set each available template with a callback to return a processor
// that implements Diarmuidie\ImageRack\Image\TemplateInterface
$server->setTemplate(
    'small',
    function () {
        return new Templates\Small();
    }
);

// Optionally set the not found response content
$server->setNotFound(function ($response) {
    return $response->setContent('Image not found.');
});

// Run the server for this request
$server->run();

// Send the response to the browser
$server->send();
