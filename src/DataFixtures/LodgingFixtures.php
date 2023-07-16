<?php

namespace App\DataFixtures;

use App\Entity\Lodging;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LodgingFixtures extends Fixture
{
    private $security;

    // public function __construct(Security $security)
    // {
    //     $this->security = $security;
    // }

    public function load(ObjectManager $manager): void
    {
        // // Récupérer l'utilisateur actuellement authentifié
        // $user = $this->security->getUser();

        // // Vérifier si l'utilisateur est connecté
        // if ($user === null) {
        //     throw new \RuntimeException("Aucun utilisateur connecté.");
        // }

        $lodging = new Lodging();

        $lodging->setTitleLod("Studio meublé");
        $lodging->setAddressLod("1 rue de la paix");
        $lodging->setZipCodeLod("33000");
        $lodging->setCityLod("Bordeaux");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::GIRONDE));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setDescriptionLod("Studio meublé, 20m2, proche de la gare, du tram et des commerces. Situé au 1er étage, il comprend une pièce principale avec kitchenette équipée, une salle d'eau avec WC");
        $lodging->setHost($this->getReference(HostFixtures::BRIGITTE_LALLOIS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-1");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre pour 2 personnes");
        $lodging->setAddressLod("35 boulevard de la liberté");
        $lodging->setZipCodeLod("34000");
        $lodging->setCityLod("Montpellier");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HERAULT));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE));
        $lodging->setDescriptionLod("Chambre privée pour 2 personnes, 10m2, proche du tram  Place Albert 1er. Situé au 1er étage, la cuisine, la salle de bain et le salon sont à partager avec famille");
        $lodging->setHost($this->getReference(HostFixtures::ADELE_JOUNEAU));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-2");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Espace nuit dans une entreprise");
        $lodging->setAddressLod("17 rue de la liberté");
        $lodging->setZipCodeLod("75019");
        $lodging->setCityLod("Paris");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::PARIS));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setDescriptionLod("Espace nuit dans une entreprise, 20m2, proche du metro Colonel Fabien. Situé au 1er étage de l'agence, le coin nuit proposé est dans l'ancienne réserve de l'entreprise, réorganisée en espace nuit. Kitchenette équipée, une salle d'eau avec WC.");
        $lodging->setHost($this->getReference(HostFixtures::JEAN_ROBA));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-3");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre d'hôtel");
        $lodging->setAddressLod("1 rue de la paix");
        $lodging->setZipCodeLod("84000");
        $lodging->setCityLod("Avignon");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::VAUCLUSE));
        $lodging->setCategory($this->getReference(CategoryFixtures::HOTEL));
        $lodging->setDescriptionLod("Chambre d'hôtel, 12m2, pour 2 personnes avec 2 lits séparés et une salle d'eau privée avec WC. Proche des ramparts et des commerces. Possibilité d'utiliser cuisine partagée");
        $lodging->setHost($this->getReference(HostFixtures::JEAN_MARIE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-4");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre privée dans une entreprise digitale");
        $lodging->setAddressLod("14 cours Saint Emilion");
        $lodging->setZipCodeLod("95000");
        $lodging->setCityLod("Cergy");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::VAL_DOISE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setDescriptionLod("Chambre privée dans une entreprise digitale, 15m2, proche du RER A. Située au rdc de l'agence, la chambre proposée est dans la salle de réunion de l'entreprise que l'on utilise ocassionnellement. Kitchenette équipée, une salle d'eau avec WC.");
        $lodging->setHost($this->getReference(HostFixtures::BINTOU_SIDIBE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_UN));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-5");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Coin nuit dans une entreprise");
        $lodging->setAddressLod("35 boulevard de la liberté");
        $lodging->setZipCodeLod("33000");
        $lodging->setCityLod("Bordeaux");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::GIRONDE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setDescriptionLod("Coin nuit dans une entreprise, 20m2, proche du tram et des commerces. Situé au 1er étage de l'agence, le coin nuit proposé est dans l'ancienne réserve de l'entreprise, réorganisée en espace nuit. Kitchenette équipée, une salle d'eau avec WC.");
        $lodging->setHost($this->getReference(HostFixtures::NASSIMA_SIBACHIR));
                $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-6");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre pour 3 personnes");
        $lodging->setAddressLod("35 rue des écoles");
        $lodging->setZipCodeLod("92300");
        $lodging->setCityLod("Levallois-Perret");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTS_DE_SEINE));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setDescriptionLod("Chambre privée pour 3 personnes, 15m2, proche du métro Anatole France. Situé au 1er étage de l'agence, cuisine et salle d'eau");
        $lodging->setHost($this->getReference(HostFixtures::DANIELLE_TANG));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_UN));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-7");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Studio pour 4 personnes");
        $lodging->setAddressLod("89 rue des collines");
        $lodging->setZipCodeLod("30000");
        $lodging->setCityLod("Nîmes");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::GARD));
        $lodging->setCategory($this->getReference(CategoryFixtures::APPARTEMENT));
        $lodging->setDescriptionLod("Studio pour 4 personnes, 25m2, proche du centre ville. Situé au 3ème étage, cuisine et salle d'eau");
        $lodging->setHost($this->getReference(HostFixtures::RACHIDA_BELANOUF));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_QUATRE));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-8");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre privée pour 3 personnes");
        $lodging->setAddressLod("35 rue des écoles");
        $lodging->setZipCodeLod("13250");
        $lodging->setCityLod("Saint-Chamas");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::BOUCHES_DU_RHONE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE));
        $lodging->setDescriptionLod("Chambre privée pour 3 personnes, 15m2 dans notre maison de village. Salon, cuisine et salle d'eau à partager. Proche de l'arrêt de bus qui dessert Marseille.");
        $lodging->setHost($this->getReference(HostFixtures::RENE_CHERQUAOUI));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_TROIS));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-9");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre privée pour 1 personne");
        $lodging->setAddressLod("35 rue des écoles");
        $lodging->setZipCodeLod("13250");
        $lodging->setCityLod("Saint-Chamas");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::BOUCHES_DU_RHONE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE));
        $lodging->setDescriptionLod("Chambre privée pour 1 personne, 9m2 dans notre maison de village. Salon, cuisine et salle d'eau à partager. Proche de l'arrêt de bus qui dessert Marseille.");
        $lodging->setHost($this->getReference(HostFixtures::RENE_CHERQUAOUI));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_UN));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-10");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre privée pour 2 personnes");
        $lodging->setAddressLod("124 boulevard de la liberté");
        $lodging->setZipCodeLod("75020");
        $lodging->setCityLod("Paris");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::PARIS));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE));
        $lodging->setDescriptionLod("Chambre privée pour 2 personnes, 12m2 dans notre appartement. Salon, cuisine et salle d'eau à partager. Proche du métro.");
        $lodging->setHost($this->getReference(HostFixtures::JEAN_MESSAN));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-11");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Coin nuit dans une entreprise de Papier");
        $lodging->setAddressLod("3 impasse des papetiers");
        $lodging->setZipCodeLod("79100");
        $lodging->setCityLod("Thouars");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::DEUX_SEVRES));
        $lodging->setCategory($this->getReference(CategoryFixtures::ENTREPRISE));
        $lodging->setDescriptionLod("Coin nuit dans une entreprise, 20m2, proche du tram et des commerces. Situé au 1er étage de l'agence, le coin nuit proposé est dans l'ancienne réserve de l'entreprise, réorganisée en espace nuit. Kitchenette équipée, une salle d'eau avec WC.");
        $lodging->setHost($this->getReference(HostFixtures::AMAH_TRAORE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_UN));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-12");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre partagée pour 6 personnes");
        $lodging->setAddressLod("14 rue des tanneurs");
        $lodging->setZipCodeLod("31200");
        $lodging->setCityLod("Toulouse");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTE_GARONNE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        $lodging->setDescriptionLod("Chambre partagée pour 6 personnes maximum, 20m2, proche du métro. Situé au 1er étage de l'agence, cuisine et salle d'eau");
        $lodging->setHost($this->getReference(HostFixtures::AMAH_TRAORE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_SIX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-13");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre partagée pour 6 personnes");
        $lodging->setAddressLod("14 rue des tanneurs");
        $lodging->setZipCodeLod("31200");
        $lodging->setCityLod("Toulouse");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTE_GARONNE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        $lodging->setDescriptionLod("Chambre partagée pour 6 personnes maximum, 20m2, proche du métro. Situé au 1er étage de l'agence, cuisine et salle d'eau");
        $lodging->setHost($this->getReference(HostFixtures::AMAH_TRAORE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_SIX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-14");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre partagée pour 6 personnes");
        $lodging->setAddressLod("14 rue des tanneurs");
        $lodging->setZipCodeLod("31200");
        $lodging->setCityLod("Toulouse");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::HAUTE_GARONNE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE_PARTAGEE));
        $lodging->setDescriptionLod("Chambre partagée pour 6 personnes maximum, 20m2, proche du métro. Situé au 1er étage de l'agence, cuisine et salle d'eau");
        $lodging->setHost($this->getReference(HostFixtures::AMAH_TRAORE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_CANAPE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_SIX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-15");
        $manager->persist($lodging);

        $lodging = new Lodging();
        $lodging->setTitleLod("Chambre privée chez l'habitant");
        $lodging->setAddressLod("153 rue du faubourg Saint-Antoine");
        $lodging->setZipCodeLod("33256");
        $lodging->setCityLod("Bordeaux");
        $lodging->setDepartment($this->getReference(AADepartmentFixtures::GIRONDE));
        $lodging->setCategory($this->getReference(CategoryFixtures::CHAMBRE));
        $lodging->setDescriptionLod("Chambre privée pour 2 personnes, 9m2 dans notre maison de village. Salon, cuisine et salle d'eau à partager. Proche de l'arrêt de bus qui dessert Marseille.");
        $lodging->setHost($this->getReference(HostFixtures::BRIGITTE_LALLOIS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_COUVERTS));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_PLAQUE_CUISSON));
        $lodging->addEquipements($this->getReference(EquipementFixtures::CUISINE_MICRO_ONDE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_TOILETTE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_LAVABO));
        $lodging->addEquipements($this->getReference(EquipementFixtures::SANITAIRES_DOUCHE));
        $lodging->addEquipements($this->getReference(EquipementFixtures::COUCHAGE_LIT));
        $lodging->addEquipements($this->getReference(EquipementFixtures::NBR_DE_LIT_DEUX));
        $lodging->setImageNameLod("image1.jpg");
        $lodging->setSlugLod("logement-16");
        $manager->persist($lodging);

        $manager->flush();
    }
}
