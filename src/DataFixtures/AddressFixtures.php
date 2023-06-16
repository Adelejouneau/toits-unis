<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AddressFixtures extends Fixture
{

    public const UTOPIA_56_PARIS='utopia-56-paris';
    public const FONDATION_ABBE_PIERRE='fondation-abbe-pierre';
    public const CROIX_ROUGE_FRANCAISE='croix-rouge-francaise';
    public const ALC='alc';
    public const BAAM='baam';
    public const BUREAUX_DU_COEUR='bureaux-du-coeur';
    public const INFO_MIGRANTS='info-migrants';
    public const SAMU_SOCIAL='samu-social';
    public const AURORE='aurore';
    public const FRANCE_TERRE_D_ASILE='france-terre-d-asile';

    public function load(ObjectManager $manager): void
    {

        $address = new Address();
        $address-> setNameAddress("Utopia 56 Paris");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("12");
        $address-> setStreetName("rue Colbert");
        $address-> setZipCode("75001");
        $address-> setCity("Paris");
        $this->addReference(self::UTOPIA_56_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Fondation Abbé Pierre");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("78-80");
        $address-> setStreetName("rue de la Réunion");
        $address-> setZipCode("75020");
        $address-> setCity("Paris");
        $this->addReference(self::FONDATION_ABBE_PIERRE, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Croix-rouge française");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("66");
        $address-> setStreetName("rue des couronnes");
        $address-> setZipCode("75020");
        $address-> setCity("Paris");
        $this->addReference(self::CROIX_ROUGE_FRANCAISE, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("ALC");
        // $address-> setDepartment("06");
        $address-> setStreetNumber("2");
        $address-> setStreetName("avenue du Docteur Emile Roux");
        $address-> setZipCode("06200");
        $address-> setCity("Nice");
        $this->addReference(self::ALC, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("BAAM");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("8");
        $address-> setStreetName("rue Duchefdelaville");
        $address-> setZipCode("75013");
        $address-> setCity("Paris");
        $this->addReference(self::BAAM, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Bureaux du coeur");
        // $address-> setDepartment("44");
        $address-> setStreetNumber("35");
        $address-> setStreetName("rue Jules Verne ");
        $address-> setZipCode("44700");
        $address-> setCity("Orvault");
        $this->addReference(self::BUREAUX_DU_COEUR, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Info migrants");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("35");
        $address-> setStreetName("rue Lune Gerbe");
        $address-> setZipCode("75019");
        $address-> setCity("Paris");
        $this->addReference(self::INFO_MIGRANTS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Samu social");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("35");
        $address-> setStreetName("avenue Courteline");
        $address-> setZipCode("75012");
        $address-> setCity("Paris");
        $this->addReference(self::SAMU_SOCIAL, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("Aurore");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("34");
        $address-> setStreetName("boulevard Sébastopol");
        $address-> setZipCode("75004");
        $address-> setCity("Paris");
        $this->addReference(self::AURORE, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setNameAddress("France Terre d'Asile");
        // $address-> setDepartment("75");
        $address-> setStreetNumber("24");
        $address-> setStreetName("rue Marc Seguin");
        $address-> setZipCode("75018");
        $address-> setCity("Paris");
        $this->addReference(self::FRANCE_TERRE_D_ASILE, $address);
        $manager->persist($address);

        $manager->flush();
    }
}