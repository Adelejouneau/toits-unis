<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EquipementFixtures extends Fixture
{

    public const CUISINE_COUVERTS = 'Cuisine - Couverts';
    public const CUISINE_MICRO_ONDE = 'Cuisine - Micro-onde';
    public const CUISINE_PLAQUE_CUISSON = 'Cuisine - Plaque de cuisson';

    public const SANITAIRES_TOILETTE = 'Sanitaires - Toilettes';
    public const SANITAIRES_LAVABO = 'Sanitaires - Lavabo';
    public const SANITAIRES_DOUCHE = 'Sanitaires - Douche';

    public const COUCHAGE_LIT = 'Couchage - Lit';
    public const COUCHAGE_CANAPE = 'Couchage - Canapé lit';
    public const COUCHAGE_AUTRE = 'Couchage - Autre couchage';

    public const NBR_DE_LIT_1 = 'Couchage - 1 personne';
    public const NBR_DE_LIT_2 = 'Couchage - 2 personnes';
    public const NBR_DE_LIT_3 = 'Couchage - 3 personnes';
    public const NBR_DE_LIT_4 = 'Couchage - 4 personnes';
    public const NBR_DE_LIT_5 = 'Couchage - 5 personnes';
    public const NBR_DE_LIT_6 = 'Couchage - 6 personnes';

    public function load(ObjectManager $manager): void
    {
        $equipement = new Equipement();

        $equipement->setTypeEquip('couverts');
        $equipement->setDescriptionEquip('Cuisine - Couverts');
        $this->addReference(self::CUISINE_COUVERTS, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('micro-onde');
        $equipement->setDescriptionEquip('Cuisine - Micro-onde');
        $this->addReference(self::CUISINE_MICRO_ONDE, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('plaque de cuisson');
        $equipement->setDescriptionEquip('Cuisine - Plaque de cuisson');
        $this->addReference(self::CUISINE_PLAQUE_CUISSON, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('toilettes');
        $equipement->setDescriptionEquip('Sanitaires - Toilettes');
        $this->addReference(self::SANITAIRES_TOILETTE, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('lavabo');
        $equipement->setDescriptionEquip('Sanitaires - Lavabo');
        $this->addReference(self::SANITAIRES_LAVABO, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('douche');
        $equipement->setDescriptionEquip('Sanitaires - Douche');
        $this->addReference(self::SANITAIRES_DOUCHE, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('lit');
        $equipement->setDescriptionEquip('Couchage - Lit');
        $this->addReference(self::COUCHAGE_LIT, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('canapé lit');
        $equipement->setDescriptionEquip('Couchage - Canapé lit');
        $this->addReference(self::COUCHAGE_CANAPE, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('autre couchage');
        $equipement->setDescriptionEquip('Couchage - Autre couchage');
        $this->addReference(self::COUCHAGE_AUTRE, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 1 personne');
        $equipement->setDescriptionEquip('Couchage - 1 personne');
        $this->addReference(self::NBR_DE_LIT_1, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 2 personnes');
        $equipement->setDescriptionEquip('Couchage - 2 personnes');
        $this->addReference(self::NBR_DE_LIT_2, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 3 personnes');
        $equipement->setDescriptionEquip('Couchage - 3 personnes');
        $this->addReference(self::NBR_DE_LIT_3, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 4 personnes');
        $equipement->setDescriptionEquip('Couchage - 4 personnes');
        $this->addReference(self::NBR_DE_LIT_4, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 5 personnes');
        $equipement->setDescriptionEquip('Couchage - 5 personnes');
        $this->addReference(self::NBR_DE_LIT_5, $equipement);
        $manager->persist($equipement);

        $equipement = new Equipement();
        $equipement->setTypeEquip('couchage 6 personnes');
        $equipement->setDescriptionEquip('Couchage - 6 personnes');
        $this->addReference(self::NBR_DE_LIT_6, $equipement);
        $manager->persist($equipement);

        $manager->flush();
    }
}
