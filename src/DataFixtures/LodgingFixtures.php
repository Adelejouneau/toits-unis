<?php

namespace App\DataFixtures;

use App\Entity\Lodging;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Security;

class LodgingFixtures extends Fixture
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function load(ObjectManager $manager): void
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = $this->security->getUser();

        // Vérifier si l'utilisateur est connecté
        if ($user === null) {
            throw new \RuntimeException("Aucun utilisateur connecté.");
        }

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description de l'appartement aménagé");
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("Chambre aménagée");
        $lodging->setSlugLod("logement-1");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::AIN));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setUser($user);
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
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 3");
        $lodging->setImageNameLod("image3.jpg");
        $lodging->setLatitude("48.1173");
        $lodging->setLongitude("-1.6778");
        $lodging->setTitleLod("Hôtel");
        $lodging->setSlugLod("logement-3");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::PARIS));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
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
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 6");
        $lodging->setImageNameLod("image5.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("Chambre disponible");
        $lodging->setSlugLod("chambre-partagee");
        $this->addReference('lodging_5', $lodging);
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTS_DE_SEINE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description de l'appartement aménagé");
        $lodging->setImageNameLod("image6.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("Chambre aménagée");
        $lodging->setSlugLod("logement-1");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::AIN));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setUser($user);
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 2");
        $lodging->setImageNameLod("image7.jpg");
        $lodging->setLatitude("43.6045");
        $lodging->setLongitude("1.4440");
        $lodging->setTitleLod("Local entreprise");
        $lodging->setSlugLod("logement-2");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTES_ALPES));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 3");
        $lodging->setImageNameLod("image8.jpg");
        $lodging->setLatitude("48.1173");
        $lodging->setLongitude("-1.6778");
        $lodging->setTitleLod("Hôtel");
        $lodging->setSlugLod("logement-3");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::PARIS));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 4");
        $lodging->setImageNameLod("image9.jpg");
        $lodging->setLatitude("47.2184");
        $lodging->setLongitude("-1.5536");
        $lodging->setTitleLod("Coin salon agréable");
        $lodging->setSlugLod("logement-4");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::YVELINES));
        $lodging->setCategory($this->getReference(CategoryFixtures::COIN_CANAPE));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setDescriptionLod("Description du logement 6");
        $lodging->setImageNameLod("image10.jpg");
        $lodging->setLatitude("48.8566");
        $lodging->setLongitude("2.3522");
        $lodging->setTitleLod("Chambre disponible");
        $lodging->setSlugLod("chambre-partagee");
        $this->addReference('lodging_5', $lodging);
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTS_DE_SEINE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setUser($user);
        // $lodging->addDate($this->getReference(DateFixtures::20/10/23));
        // $lodging->->setAddress($this->getReference(AddressFixtures::(écrire l'adresse)));
        $manager->persist($lodging);

        $manager->flush();
    }
}
