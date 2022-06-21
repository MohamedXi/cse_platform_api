<?php
namespace App\Service;


use App\Repository\ItemRepository;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpFoundation\File\File;
use App\Entity\Image;

class ImageService
{

    private ItemRepository $itemRepository;

    /**
     * ImageService constructor.
     */
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param File $file
     * @param string $itemId
     * @return Image
     */
    public function createItemImage(File $file,string $itemId): Image
    {
        $image = new Image();
        $image->file = $file;

        // Get Item
        $item = $this->itemRepository->find((Uuid::fromString($itemId))->toBinary());
        $item->addImage($image);

        return $image;
    }


}
