<?php

namespace App\DataFixtures;

use App\Entity\Category;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public const APPARTEMENT='appartement';
    public const MAISON='maison';
    public const HOTEL='hôtel';
    public const ENTREPRISE='entreprise';
    public const AUTRE='autre';
    public const COIN_CANAPE='coin-canapé';
    public const CHAMBRE='chambre';
    public const CHAMBRE_PARTAGEE='chambre-partagée';
    
    public function load(ObjectManager $manager): void
    {

$category = new Category();
$category->setNameCat('Appartement');
$category->setSlugCat("appartement");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::APPARTEMENT, $category);
$manager->persist($category);
        
$category = new Category();
$category->setNameCat("Maison");
$category->setSlugCat("maison");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::MAISON, $category);
$manager->persist($category);

$category = new Category();
$category->setNameCat("Hôtel");
$category->setSlugCat("hotel");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::HOTEL, $category);
$manager->persist($category);
        
$category = new Category();
$category->setNameCat("Entreprise");
$category->setSlugCat("entreprise");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::ENTREPRISE, $category);
$manager->persist($category);

$category = new Category();
$category->setNameCat("Coin canapé");
$category->setSlugCat("coin-canape");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::COIN_CANAPE, $category);
$manager->persist($category);

$category = new Category();
$category->setNameCat("Chambre");
$category->setSlugCat("chambre");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::CHAMBRE, $category);
$manager->persist($category);

$category = new Category();
$category->setNameCat("Chambre partagée");
$category->setSlugCat("chambre-partagee");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::CHAMBRE_PARTAGEE, $category);
$manager->persist($category);

$category = new Category();
$category->setNameCat("Autre");
$category->setSlugCat("autre");
$category->setUpdatedAt(new DateTimeImmutable);
$this->addReference(self::AUTRE, $category);
$manager->persist($category);
        
    $manager->flush();
    }

}
