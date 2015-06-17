<?php

error_reporting(E_ALL | E_STRICT);

require 'vendor/autoload.php';

$container = require_once __DIR__.'/../bootstrap/dependencies.php';

// Run the imageRack server
$server = new Diarmuidie\ImageRack\Server($container);

// Set the valid templates
$server->setTemplates(['small']);

$server->run();
