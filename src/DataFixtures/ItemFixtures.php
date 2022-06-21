<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use App\Entity\Image;
use App\Entity\Item;
use App\Entity\ItemType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    const PS5 = "Playstation 5";
    const POKEMEON = "New Pokémon Snap Nintendo Switch";
    const OTELLO = "Otello Metropolitan Opera New York";
    const MONOPOLY = "Jeu de société Monopoly Junior";
    const LOUPGAROUS = "Jeu de stratégie Les Loups garous";

    const ALL_ITEMS = [
        ItemTypeFixtures::JC => [
            'item1' => [
                'itemName' => self::MONOPOLY,
                'tagName' => [TagFixtures::TAGJEUX, TagFixtures::TAGENFANT, TagFixtures::TAGFAMILLE],
                'imageName' => 'Jeu-de-societe-Monopoly-Junior.jpg',
                'description' => 'Monopoly Junior adapte les règles du jeu de société le plus connu au monde, le Monopoly Classique, pour les plus petits.',
                'endDateAvailable' => '-1 day',

            ],
            'item2' => [
                'itemName' => self::LOUPGAROUS,
                'tagName' => [TagFixtures::TAGJEUX, TagFixtures::TAGFAMILLE],
                'imageName' => 'Jeu-de-strategie-Asmodee-Les-Loups-garous-de-Thiercelieux.jpg',
                'description' => 'Chaque nuit, de cruels loups-garous éliminent un villageois. Le lendemain, les camarades de la victime se vengent en exterminant un monstre présumé. Pour l’emporter, éliminez tous les joueurs du clan adverse !',
                'endDateAvailable' => '-1 day',
            ],
        ],
        ItemTypeFixtures::DVD => [
            'item1' => [
                'itemName' => self::OTELLO,
                'tagName' => TagFixtures::TAGCONCERT,
                'imageName' => 'Otello-Metropolitan-Opera-New-York-2015-Blu-ray.jpg',
                'description' => 'Otello de Verdi, un des cinq grands chef-d\'ouvre de l\'art lyrique filmé ici au Met(ropolitan) de New York, dans une distribution magnifique, dominée par la présence irradiante de Sonya Yoncheva, voix idéale en timbre et en couleur pour le rôle de Desdémone.',
                'endDateAvailable' => '-1 day',
            ],
        ],
        ItemTypeFixtures::JV => [
            'item1' => [
                'itemName' => self::PS5,
                'tagName' => TagFixtures::TAGPS,
                'imageName' => 'Console-Sony-PS5-Edition-Standard.jpg',
                'description' => '',
                'endDateAvailable' => '-1 day',
            ],
            'item2' => [
                'itemName' => self::POKEMEON,
                'tagName' => TagFixtures::TAGJEUX,
                'imageName' => 'New-Pokemo-Snap.png',
                'description' => 'Jeu de rôle/RPG',
                'endDateAvailable' => '-1 day',
            ]
        ]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (AgencyFixtures::ALL_AGENCIES as $agencyRefName) {
            /**
             * @var string $itemTypeName
             * @var string[] $items
             */
            foreach (self::ALL_ITEMS as $itemTypeName => $items) {
                foreach ($items as $itemToAdd) {
                    if ($itemToAdd) {
                        $image = new Image();
                        $image->setFilePath($itemToAdd['imageName']);
                        /** @var ItemType $itemType */
                        $itemType = $this->getReference($itemTypeName);
                        $item = (new Item())
                            ->setName($itemToAdd['itemName'])
                            ->setRentPrice(0)
                            ->addImage($image)
                            ->setItemType($itemType)
                            ->setDescription($itemToAdd['description']);
                        if (array_key_exists('endDateAvailable', $itemToAdd)) {
                            $item->setEndDateAvailable(new \DateTime($itemToAdd['endDateAvailable']));
                        }
                        /** @var Agency $agency */
                        $agency = $this->getReference($agencyRefName);
                        $agency->addItem($item);
                        if (is_array($itemToAdd['tagName'])){
                            foreach ($itemToAdd['tagName'] as $tag)  {
                                $item->addTag($this->getReference($tag));
                            }
                        } else {
                            $item->addTag($this->getReference($itemToAdd['tagName']));
                        }

                        $manager->persist($item);
                        $this->addReference($itemToAdd['itemName'] . '-' . $agencyRefName, $item);
                    }
                }
            }
        }
        $manager->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            AgencyFixtures::class,
            TagFixtures::class,
            ItemTypeFixtures::class,
        ];
    }

}
