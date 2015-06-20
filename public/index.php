<?php

error_reporting(E_ALL | E_STRICT);

require 'vendor/autoload.php';

// Load our dependencies
$container = require_once __DIR__.'/../bootstrap/dependencies.php';

// Run the imageRack server
$server = new Diarmuidie\ImageRack\Server($container);

// Array of available templates with claaback to return a processor
// that implements Diarmuidie\ImageRack\Image\TemplateInterface
$templates = array(
    'small' => function () {
        return new Templates\Small();
    }
);

// Set the valid templates
$server->setTemplates($templates);

$server->run();
