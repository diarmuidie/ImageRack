<?php

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as Adapter;
use Intervention\Image\ImageManager;

$dependencies = [];

// The source image filesystem
$dependencies['source'] = new Filesystem(new Adapter(__DIR__.'/../storage/source'));

// The cache image filesystem
$dependencies['cache'] = new Filesystem(new Adapter(__DIR__.'/../storage/cache'));

// The Intervention image manager instance
$dependencies['imageManager'] = new ImageManager(array('driver' => 'gd'));

return $dependencies;
