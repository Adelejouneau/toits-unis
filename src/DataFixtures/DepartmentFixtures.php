<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DepartmentFixtures extends Fixture
{
    public const AIN='AIN';
    public const AISNE='AISNE';
    public const NUMERO_DE_DEPATEMENT='NUMERO ';
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
        $this->addReference(self::HAUTES-ALPES, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Alpes-Maritimes-Ardèche");
        $department->setCodeDepartment("06");
        $this->addReference(self::ALPES-MARITIMES-ARDECHE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardèche");
        $department->setCodeDepartment("07");
        $this->addReference(self::ARDECHE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ardennes");
        $department->setCodeDepartment("08");
        $this->addReference(self::ARDENNES, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Ariège");
        $department->setCodeDepartment("09");
        $this->addReference(self::ARIEGE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aube");
        $department->setCodeDepartment("10");
        $this->addReference(self::AUBE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aude");
        $department->setCodeDepartment("11");
        $this->addReference(self::AUDE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Aveyron");
        $department->setCodeDepartment("12");
        $this->addReference(self:: AVEYRON, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Paris");
        $department->setCodeDepartment("75");
        $this->addReference(self::PARIS , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-Maritime");
        $department->setCodeDepartment("76");
        $this->addReference(self:: SEINE-MARITIME, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine-et-Marne");
        $department->setCodeDepartment("77");
        $this->addReference(self::SEINE-ET-MARNE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Yvelines");
        $department->setCodeDepartment("78");
        $this->addReference(self:: YVELINES, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Deux-Sèvres");
        $department->setCodeDepartment("79");
        $this->addReference(self::DEUX-SEVRES , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Somme");
        $department->setCodeDepartment("80");
        $this->addReference(self::SOMME , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Essonne");
        $department->setCodeDepartment("91");
        $this->addReference(self::ESSONNE , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Hauts-de-Seine");
        $department->setCodeDepartment("92");
        $this->addReference(self::HAUTS-DE-SEINE , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Seine St Denis");
        $department->setCodeDepartment("93");
        $this->addReference(self::SEINE-ST-DENIS , $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment(" ");
        $department->setCodeDepartment("94");
        $this->addReference(self::VAL-De-MARNE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Val-D'Oise ");
        $department->setCodeDepartment("95");
        $this->addReference(self::VAL-DOISE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Guadeloupe");
        $department->setCodeDepartment("971");
        $this->addReference(self::GUADELOUPE, $DEPARTMENT);
        $manager->persist($department);
        
        $department = new Department();
        $department->setNameDepartment("Martinique ");
        $department->setCodeDepartment("972");
        $this->addReference(self::MARTINIQUE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Guyane");
        $department->setCodeDepartment("973");
        $this->addReference(self::GUYANE, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("La Réunion");
        $department->setCodeDepartment("974");
        $this->addReference(self::LAREUNION, $DEPARTMENT);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("Mayotte");
        $department->setCodeDepartment("976");
        $this->addReference(self::MAYOTTE, $DEPARTMENT);
        $manager->persist($department);

































        $manager->flush();
    }
}
