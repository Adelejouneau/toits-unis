<?php

namespace App\DataFixtures;
use App\Entity\Address;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AddressFixtures extends Fixture
{

    public const COLBERT_PARIS='12-rue-colbert';
    public const LA_REUNION_PARIS='78-rue-de-la-reunion';
    public const COURONNES_PARIS='66-rue-des-couronnes';
    public const DOCTEUR_EMILE_ROUX_NICE='2-avenue-du-Docteur-emile-roux';
    public const DUCHEFDELAVILLE_PARIS='8-rue-duchefdelaville';
    public const JULES_VERNES_ORVAULT='35-rue-Jules-verne';
    public const LUNE_GERBE_PARIS='35-rue-lune-gerbe';
    public const COURTELINE_PARIS='35-avenue-courteline';
    public const SEBASTOPOL_PARIS='34-boulevard-sebastopol';
    public const MARC_SEGUIN_PARIS='24-rue-marc-seguin';
    public const ROMAINVILLE_PARIS='3-rue-romainville';
    public const CHARENTON_PARIS='103-rue-de-charenton';
    public const CHARLES_DE_GAULLE_SAINT_HERBLAIN='16-boulevars-charles-de-gaulle';
    public const CAMILLE_DESMOULINS_ISSY_LES_MOULINEAUX='80-rue-camille-desmoulins';


    public function load(ObjectManager $manager): void
    {

        $address = new Address();
        $address-> setStreetNumber("12");
        $address-> setStreetName("rue Colbert");
        $address-> setZipCode("75001");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::AIN));
        $this->addReference(self::COLBERT_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("3");
        $address-> setStreetName("rue de Romainville");
        $address-> setZipCode("75019");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::AISNE));
        $this->addReference(self::ROMAINVILLE_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("78-80");
        $address-> setStreetName("rue de la Réunion");
        $address-> setZipCode("75020");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::ALLIER));
        $this->addReference(self::LA_REUNION_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("66");
        $address-> setStreetName("rue des couronnes");
        $address-> setZipCode("75020");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::ALPES_DE_HAUTE_PROVENCE));
        $this->addReference(self::COURONNES_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("2");
        $address-> setStreetName("avenue du Docteur Emile Roux");
        $address-> setZipCode("06200");
        $address-> setCity("Nice");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::ALPES_MARITIMES));
        $this->addReference(self::DOCTEUR_EMILE_ROUX_NICE, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("8");
        $address-> setStreetName("rue Duchefdelaville");
        $address-> setZipCode("75013");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::ARDECHE));
        $this->addReference(self::DUCHEFDELAVILLE_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("35");
        $address-> setStreetName("rue Jules Verne ");
        $address-> setZipCode("44700");
        $address-> setCity("Orvault");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::AUBE));
        $this->addReference(self::JULES_VERNES_ORVAULT, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("35");
        $address-> setStreetName("rue Lune Gerbe");
        $address-> setZipCode("75019");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::ESSONNE));
        $this->addReference(self::LUNE_GERBE_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("35");
        $address-> setStreetName("avenue Courteline");
        $address-> setZipCode("75012");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::AUDE));
        $this->addReference(self::COURTELINE_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("34");
        $address-> setStreetName("boulevard Sébastopol");
        $address-> setZipCode("75004");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::DEUX_SEVRES));
        $this->addReference(self::SEBASTOPOL_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("24");
        $address-> setStreetName("rue Marc Seguin");
        $address-> setZipCode("75018");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::SEINE_ST_DENIS));
        $this->addReference(self::MARC_SEGUIN_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("103");
        $address-> setStreetName("rue de Charenton");
        $address-> setZipCode("75012");
        $address-> setCity("Paris");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::SEINE_MARITIME));
        $this->addReference(self::CHARENTON_PARIS, $address);
        $manager->persist($address);

        $address = new Address();
        $address-> setStreetNumber("16");
        $address-> setStreetName("boulevard Charles de Gaulle");
        $address-> setZipCode("44800");
        $address-> setCity("Saint-Herblain");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::GUADELOUPE));
        $this->addReference(self::CHARLES_DE_GAULLE_SAINT_HERBLAIN, $address);
        $manager->persist($address);


        $address = new Address();
        $address-> setStreetNumber("80");
        $address-> setStreetName("rue Camille Desmoulins");
        $address-> setZipCode("92130");
        $address-> setCity("Issy les Moulineaux");
        $address-> addAADepartment($this->getReference(AADepartmentFixtures::GUYANE));
        $this->addReference(self::CAMILLE_DESMOULINS_ISSY_LES_MOULINEAUX, $address);
        $manager->persist($address);


        $manager->flush();
    }
}
