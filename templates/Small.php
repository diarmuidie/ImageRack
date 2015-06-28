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

        // Encode the manipulated image and return it
        $image->encode();
        return $image;
    }
}
