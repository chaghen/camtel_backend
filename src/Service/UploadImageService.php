<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class UploadImageService
{

    public function __construct(private ParameterBagInterface $param)
    {
    }

    public function upload($image)
    {

        $targetDirectory = $this->param->get('images_posts_directory');
        $fichier = random_int(1720944, 6958936767) . uniqid(rand(), true) . $image->getClientOriginalName();
        $image->move(
            $targetDirectory,
            $fichier
        );

        return $fichier;
    }
}
