<?php

namespace Templates;

use \Diarmuidie\ImageRack\Image\TemplateInterface;

/**
 * Sample template to fit and image to 300px x 240px
 */
class Small implements TemplateInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(\Intervention\Image\Image $image)
    {
        $image->fit(320, 240);
        return $image;
    }
}
