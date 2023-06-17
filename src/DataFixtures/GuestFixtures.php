<?php

namespace App\DataFixtures;

use App\Entity\Guest;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GuestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $guest = new Guest();
        $guest->setHobbiesGuest('le football et la musique');
        $guest->setNbrLitsGuest('2');
        $guest->setEmail('emiliano.gaba@gmail.com');
        $guest->setPassword('emilianodelavega');
        $guest->setLastName('Gaba');
        $guest->setFirstName('Emiliano');
        $guest->setPhoneUser('0659756580');
        $guest->setImageNameUser('emiliano.png');
        $guest->setGender('M');
        $guest->setUpdatedAt(new DateTimeImmutable);
        $guest->setAddress($this->getReference(AddressFixtures::COURTELINE_PARIS));
        $guest-> setAssociation($this->getReference(AssociationFixtures::BAAM));
        $manager->persist($guest);

        $manager->flush();
    }
}
