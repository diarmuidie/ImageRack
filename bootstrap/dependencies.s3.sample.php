<?php

use League\Flysystem\Filesystem;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Intervention\Image\ImageManager;

$dependencies = [];

// Create an S3 client
$s3Client = S3Client::factory([
    'credentials' => [
        'key'    => '', // Add your S3 Key here
        'secret' => '', // Add your S3 Secret here
    ],
    'region' => 'eu-west-1',
    'version' => 'latest',
]);

// The source image filesystem
$dependencies['source'] = new Filesystem(new AwsS3Adapter($s3Client, 'image-rack-source-bucket'));

// The cache image filesystem
$dependencies['cache'] = new Filesystem(new AwsS3Adapter($s3Client, 'image-rack-cache-bucket'));

// The Intervention image manager instance
$dependencies['imageManager'] = new ImageManager(array('driver' => 'gd'));

return $dependencies;
