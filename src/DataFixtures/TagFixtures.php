<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{

    const TAGJEUX = 'Jeux';
    const TAGPS = 'Playstation';
    const TAGCONCERT = 'Concert';
    const TAGFAMILLE = 'Famille';
    const TAGENFANT = "Enfant";
    const ALL_TAGS = [
        self::TAGJEUX,
        self::TAGPS,
        self::TAGCONCERT,
        self::TAGFAMILLE,
        self::TAGENFANT,
    ];

    public function load(ObjectManager $manager)
    {

        // list of itemTypes
        foreach (self::ALL_TAGS as $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $manager->persist($tag);
            $this->addReference($tagName, $tag);
        }
        $manager->flush();
    }

}
