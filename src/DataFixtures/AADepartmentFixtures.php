<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AADepartmentFixtures extends Fixture
{

    public const AIN='Ain';
    public const AISNE='Aisne';
    public const ALLIER='Allier';
    public const ALPES_DE_HAUTE_PROVENCE='Alpes-de-Haute-Provence';
    public const HAUTES_ALPES='Hautes-Alpes';
    public const ALPES_MARITIMES='Alpes-Maritimes';
    public const ARDECHE='Ardèche';
    public const ARDENNE='Ardènne';
    public const ARIEGE='Ariège';
    public const AUBE='Aube';
    public const AUDE='Aude';
    public const AVEYRON='Aveyron';
    // public const PARIS='Paris';
    public const SEINE_MARITIME='Seine-Maritime';
    public const SEINE_ET_MARNE='Seine-et-Marne';
    public const YVELINES='Yvelines';
    public const DEUX_SEVRES='Deux-Sèvres';
    public const SOMME='Somme';
    public const ESSONNE='Essonne';
    public const HAUTS_DE_SEINE='Hauts-de-Seine';
    public const SEINE_ST_DENIS='Seine-St-Denis';
    public const VAL_DE_MARNE='Val-de-Marne';
    public const VAL_DOISE='Val-Doise';
    public const GUADELOUPE='Guadeloupe';
    public const MARTINIQUE='Martinique';
    public const GUYANE='Guyane';
    public const MAYOTTE='Mayotte';
    public const LA_REUNION='La Réunion';
    public const LOIRE_ATLANTIQUE='loire-atlantique';

    public function load(ObjectManager $manager): void
    {
    
        $department = new Department();
        $department->setNameDepartment("Ain");
        $department->setCodeDepartment("01");
        $this->addReference(self::AIN, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aisne");
        $department->setCodeDepartment("02");
        $this->addReference(self::AISNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Allier");
        $department->setCodeDepartment("03");
        $this->addReference(self::ALLIER, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Alpes-de-Haute-Provence");
        $department->setCodeDepartment("04");
        $this->addReference(self::ALPES_DE_HAUTE_PROVENCE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Hautes-Alpes");
        $department->setCodeDepartment("05");
        $this->addReference(self::HAUTES_ALPES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Alpes-Maritimes");
        $department->setCodeDepartment("06");
        $this->addReference(self::ALPES_MARITIMES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardèche");
        $department->setCodeDepartment("07");
        $this->addReference(self::ARDECHE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardennes");
        $department->setCodeDepartment("08");
        $this->addReference(self::ARDENNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ariège");
        $department->setCodeDepartment("09");
        $this->addReference(self::ARIEGE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aube");
        $department->setCodeDepartment("10");
        $this->addReference(self::AUBE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aude");
        $department->setCodeDepartment("11");
        $this->addReference(self::AUDE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aveyron");
        $department->setCodeDepartment("12");
        $this->addReference(self:: AVEYRON, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Loire Atlantique");
        $department->setCodeDepartment("44");
        $this->addReference(self:: LOIRE_ATLANTIQUE, $department);
        $manager->persist($department);

        // $department = new Department();
        // $department->setNameDepartment("Paris");
        // $department->setCodeDepartment("75");
        // $this->addReference(self::PARIS, $department);
        // $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-Maritime");
        $department->setCodeDepartment("76");
        $this->addReference(self:: SEINE_MARITIME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-et-Marne");
        $department->setCodeDepartment("77");
        $this->addReference(self::SEINE_ET_MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Yvelines");
        $department->setCodeDepartment("78");
        $this->addReference(self:: YVELINES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Deux-Sèvres");
        $department->setCodeDepartment("79");
        $this->addReference(self::DEUX_SEVRES , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Somme");
        $department->setCodeDepartment("80");
        $this->addReference(self::SOMME , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Essonne");
        $department->setCodeDepartment("91");
        $this->addReference(self::ESSONNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Hauts-de-Seine");
        $department->setCodeDepartment("92");
        $this->addReference(self::HAUTS_DE_SEINE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine St Denis");
        $department->setCodeDepartment("93");
        $this->addReference(self::SEINE_ST_DENIS , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Val-de-Marne ");
        $department->setCodeDepartment("94");
        $this->addReference(self::VAL_DE_MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Val-D'Oise ");
        $department->setCodeDepartment("95");
        $this->addReference(self::VAL_DOISE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Guadeloupe");
        $department->setCodeDepartment("971");
        $this->addReference(self::GUADELOUPE, $department);
        $manager->persist($department);
        
        $department = new Department();
        $department->setNameDepartment("Martinique ");
        $department->setCodeDepartment("972");
        $this->addReference(self::MARTINIQUE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Guyane");
        $department->setCodeDepartment("973");
        $this->addReference(self::GUYANE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("La Réunion");
        $department->setCodeDepartment("974");
        $this->addReference(self::LA_REUNION, $department);
        $manager->persist($department);

        $department = new Department();

        $department->setNameDepartment("Mayotte");
        $department->setCodeDepartment("976");
        $this->addReference(self::MAYOTTE, $department);
        $manager->persist($department);

        $manager->flush();
    }
}
