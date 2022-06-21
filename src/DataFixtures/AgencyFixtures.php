<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgencyFixtures extends Fixture
{
    const RENNES = "Rennes";
    const NANTES = "Nantes";
    const PARIS = "Paris";
    const LILLE = "Lille";
    const BORDEAUX = "Bordeaux";
    const STRASBOURG = "Strasbourg";
    const ALL_AGENCIES = [self::RENNES, self::NANTES, self::PARIS, self::LILLE, self::BORDEAUX, self::STRASBOURG];
    public function load(ObjectManager $manager)
    {
        // list of agency
        foreach (self::ALL_AGENCIES as $agencyName){
            $agency = new Agency();
            $agency->setName($agencyName);
            $this->addReference($agencyName, $agency);
            $manager->persist($agency);
        }
        $manager->flush();

    }

}
