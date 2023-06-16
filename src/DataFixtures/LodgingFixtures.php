<?php

namespace App\DataFixtures;

use App\Entity\Lodging;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LodgingFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du appartement amenagé");
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("apparement avec un chambre amenagé");
        $lodging->setSlugLod("logement-1");
        $lodging->setDepartment($this->getReference(DepartmentFixtures::AIN));
        // $lodging->->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 2");
        $lodging->setImageNameLod("image2.jpg");
        $lodging->setLatitude("43.6045");
        $lodging->setLongitude("1.4440");
        $lodging->setTitleLod("local entreprise");
        $lodging->setSlugLod("logement-2");
        $lodging->setDepartment($this->getReference(DepartmentFixtures::HAUTES_ALPES));
        // $lodging->->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 3");
        $lodging->setImageNameLod("image3.jpg");
        $lodging->setLatitude("48.1173");
        $lodging->setLongitude("-1.6778");
        $lodging->setTitleLod("hotel");
        $lodging->setSlugLod("logement-3");
        $lodging->setDepartment($this->getReference(DepartmentFixtures::PARIS));
        // $lodging->->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 4");
        $lodging->setImageNameLod("image4.jpg");
        $lodging->setLatitude("47.2184");
        $lodging->setLongitude("-1.5536");
        $lodging->setTitleLod("coin-salon-agréable");
        $lodging->setSlugLod("logement-4");
        $lodging->setDepartment($this->getReference(DepartmentFixtures::YVELINES));
        // $lodging->->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 6");
        $lodging->setImageNameLod("image6.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("chambre disponible");
        $lodging->setSlugLod("chambre-partagée");
        $this->addReference('lodging_5', $lodging);
        // $lodging->->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $lodging->setDepartment($this->getReference(DepartmentFixtures::AIN));
        $manager->persist($lodging);

        $manager->flush();
    }
}
