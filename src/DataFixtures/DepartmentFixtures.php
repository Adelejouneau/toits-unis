<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DepartmentFixtures extends Fixture
{
    // public const APPARTEMENT='appartement';
    public const AIN='Ain';
    public const NUMERO_DE_DEPARTEMENT='01';
    public const AISNE='Aisne';
    public const NUMERO_DE_DEPARTEMENT='02';
    public const ALLIER='Allier';
    public const NUMERO_DE_DEPARTEMENT='03';
    public const ALPES_DE_HAUTE_PROVENCE='Alpes-de-Haute-Provence';
    public const NUMERO_DE_DEPARTEMENT='04';
    public const HAUTES_ALPES='Hautes-Alpes';
    public const NUMERO_DE_DEPARTEMENT='05';
    public const ALPES_MARITIMES 'Alpes-Maritimes';
    public const NUMERO_DE_DEPARTEMENT='06';
    public const Ardèche='ARDECHE';
    public const NUMERO_DE_DEPARTEMENT='07';
    public const ARDENNE='Ardènne';
    public const NUMERO_DE_DEPARTEMENT='08';
    public const ARIEGE='Ariège';
    public const NUMERO_DE_DEPARTEMENT='09';
    public const AUBE= 'Aube';
    public const NUMERO_DE_DEPARTEMENT='10';
    public const AUDE= 'Aude';
    public const NUMERO_DE_DEPARTEMENT='11';
    public const AVEYRON='Aveyron';
    public const NUMERO_DE_DEPARTEMENT='12';
    public const PARIS= 'Paris';
    public const NUMERO_DE_DEPARTEMENT='75';
    public const SEINE_MARITIME='Seine-Maritime';
    public const NUMERO_DE_DEPARTEMENT='76';
    public const SEINE_ET_MARITIME='Seine-et-Marne';
    public const NUMERO_DE_DEPARTEMENT='77';
    public const YVELINES='Yvelines';
    public const NUMERO_DE_DEPARTEMENT='78';
    public const DEUX_SEVRES='Deux-Sèvres';
    public const NUMERO_DE_DEPARTEMENT='79';
    public const SOMME='Somme';
    public const NUMERO_DE_DEPARTEMENT='80';
    public const ESSONNE='Essonne';
    public const NUMERO_DE_DEPARTEMENT='91';
    public const HAUT_DE_SEINE='Hauts-de-Seine';
    public const NUMERO_DE_DEPARTEMENT='92';
    public const SEINE_ST_DENIS='Seine-St-Denis';
    public const NUMERO_DE_DEPARTEMENT='93';
    public const VAL_DE_MARNE='Val-de-Marne';
    public const NUMERO_DE_DEPARTEMENT='94';
    public const VAL_D_OISE='Val-DOise';
    public const NUMERO_DE_DEPARTEMENT='95';
    public const GUADELOUPE='Guadeloupe';
    public const NUMERO_DE_DEPARTEMENT='971';
    public const MARTINIQUE='Martinique';
    public const NUMERO_DE_DEPARTEMENT='972';
    public const GUYANE='Guyane';
    public const NUMERO_DE_DEPARTEMENT='973';
    public const MAYOTTE='Mayotte';
    public const NUMERO_DE_DEPARTEMENT='974';


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
        $this->addReference(self::ALPES-DE-HAUTE-PROVENCE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Hautes-Alpes");
        $department->setCodeDepartment("05");
        $this->addReference(self::HAUTES-ALPES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Alpes-Maritimes");
        $department->setCodeDepartment("06");
        $this->addReference(self::ALPES-MARITIMES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardèche");
        $department->setCodeDepartment("07");
        $this->addReference(self::ARDECHE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardennes");
        $department->setCodeDepartment("08");
        $this->addReference(self::ARDENNES, $department);
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
        $department->setNameDepartment("Paris");
        $department->setCodeDepartment("75");
        $this->addReference(self::PARIS , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-Maritime");
        $department->setCodeDepartment("76");
        $this->addReference(self:: SEINE-MARITIME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-et-Marne");
        $department->setCodeDepartment("77");
        $this->addReference(self::SEINE-ET-MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Yvelines");
        $department->setCodeDepartment("78");
        $this->addReference(self:: YVELINES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Deux-Sèvres");
        $department->setCodeDepartment("79");
        $this->addReference(self::DEUX-SEVRES , $department);
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
        $this->addReference(self::HAUTS-DE-SEINE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine St Denis");
        $department->setCodeDepartment("93");
        $this->addReference(self::SEINE-ST-DENIS , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Val-de-Marne ");
        $department->setCodeDepartment("94");
        $this->addReference(self::VAL-De-MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Val-D'Oise ");
        $department->setCodeDepartment("95");
        $this->addReference(self::VAL-DOISE, $department);
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
        $this->addReference(self::LAREUNION, $department);
        $manager->persist($department);

        $department = new Department();

        $department->setNameDepartment("Mayotte");
        $department->setCodeDepartment("976");
        $this->addReference(self::MAYOTTE, $department);
        $manager->persist($department);

        $manager->flush();
    }
}
