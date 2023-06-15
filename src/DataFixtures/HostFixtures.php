<?php

namespace App\DataFixtures;

use App\Entity\Host;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HostFixtures extends Fixture
{   
    public const PARTICULIER='particulier';
    public const ENTREPRISE='entreprise';
    public function load(ObjectManager $manager): void
    {   
        $host = new Host("");
        $host -> setEntreprise("");
        $host -> setProfession("");
        $host-> setlastName("Fari");
        $host-> setFirstName("LYLY");
        $host-> setEmail("");
        $host-> setPhoneUser("");
        $host-> setImageNameUser("");
        $host-> setPassword("");
        // $host -> setUpdateAt(new DateTimeImmutable);
        $host->setGender("");
        $manager->persist($host);

        $manager->flush();
    }
}
