<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GuestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $guest = newGuest();
        // $manager->persist($guest);

        $manager->flush();
    }
}
