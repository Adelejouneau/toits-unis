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
        $lodging->setTitleLod(" Chambre amenagé");
        $lodging->setSlugLod("logement-1");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::AIN));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setUser($this->getReference(AUserFixtures::SMITH_JANE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 2");
        $lodging->setImageNameLod("image2.jpg");
        $lodging->setLatitude("43.6045");
        $lodging->setLongitude("1.4440");
        $lodging->setTitleLod("Local entreprise");
        $lodging->setSlugLod("logement-2");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTES_ALPES));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setUser($this->getReference(AUserFixtures::DOE_JOHN));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 3");
        $lodging->setImageNameLod("image3.jpg");
        $lodging->setLatitude("48.1173");
        $lodging->setLongitude("-1.6778");
        $lodging->setTitleLod("Hotel");
        $lodging->setSlugLod("logement-3");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::PARIS));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        // $lodging->->addHost($this->getReference(HostFixtures::CORINNE));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 4");
        $lodging->setImageNameLod("image4.jpg");
        $lodging->setLatitude("47.2184");
        $lodging->setLongitude("-1.5536");
        $lodging->setTitleLod("Coin salon agréable");
        $lodging->setSlugLod("logement-4");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::YVELINES));
        $lodging->setCategory($this->getReference(CategoryFixtures::COIN_CANAPE));
        $lodging->setUser($this->getReference(AUserFixtures::SI_BACHIR_NASSIMA));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 6");
        $lodging->setImageNameLod("image2.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("chambre disponible");
        $lodging->setSlugLod("Chambre partagée");
        $this->addReference('lodging_5', $lodging);
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTS_DE_SEINE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setUser($this->getReference(AUserFixtures::SIDIBE_BINTOU));
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(ecrire l'address)));
        $manager->persist($lodging);

        $manager->flush();
    }
}
