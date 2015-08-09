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
$server->setTemplate('small', function () {
    return new Templates\Small();
});

// Uncomment to edit the default cache http header max age (in seconds).
// Set to zero to disable browser caching
// $server->setHttpCacheMaxAge(86400);

// Uncomment to edit the default not found response
// $server->setNotFound(function ($response) {
//     return $response->setContent('Image not found.');
// });

// Uncomment to edit the default error response
// $server->setError(function ($response, $exception) {
//     return $response->setContent('An internal error occured. ' . $exception->getMessage());
// });

// Run the server for this request
$server->run();

// Send the response to the browser
$server->send();
