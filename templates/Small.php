<?php

namespace Templates;

use \Diarmuidie\ImageRack\Image\TemplateInterface;

/**
 * Sample template to fit an image to 300px x 240px
 */
class Small implements TemplateInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(\Intervention\Image\Image $image)
    {
        // Manipulate the image as required
        $image->fit(320, 240);

        // Optionally encode the manipulated image or let
        // imageRack encode it with the default values.
        // $image->encode();
        
        // Return the manipulated image
        return $image;
    }
}
