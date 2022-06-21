<?php

namespace App\DataFixtures;

use App\Entity\ItemType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemTypeFixtures extends Fixture
{
    const JV = 'Jeux vidéo';
    const JC = 'Jeux de société';
    const MATOS = 'Matériels';
    const DVD = 'Dvd';
    const ALL_ITEM_TYPES = [
        self::JV,
        self::JC,
        self::MATOS,
        self::DVD,
    ];

    public function load(ObjectManager $manager)
    {
        // list of itemTypes
        foreach (self::ALL_ITEM_TYPES as $category){
            $itemType = new ItemType();
            $itemType->setName($category);
            $manager->persist($itemType);
            $this->addReference($category, $itemType);
        }
        $manager->flush();
    }
}
