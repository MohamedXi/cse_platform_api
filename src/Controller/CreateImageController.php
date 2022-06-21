<?php
// api/src/Controller/CreateMediaObjectAction.php

namespace App\Controller;

use App\Entity\Image;
use App\Service\ImageService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateImageController
{

    private ImageService $imageService;

    /**
     * CreateMediaObjectAction constructor.
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function __invoke(Request $request): Image
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }
        $itemId = $request->get('item');
        if (!$itemId) {
            $image = (new Image())->setFile($uploadedFile);
        } else {
            $itemId = str_replace('api/items/', '', $itemId);
            $image = $this->imageService->createItemImage($uploadedFile, $itemId);
        }

        return $image;
    }
}
