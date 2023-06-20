<?php

namespace App\DataFixtures;

use App\Entity\Guest;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GuestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $guest = new Guest();
        $guest->setHobbiesGuest('une description');
        $guest->setNbrLitsGuest('1');
        $manager->persist($guest);

        $manager->flush();
    }
}
