<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DepartmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $department = new Department();
        $department->setNameDepartment("");
        $department->setCodeDepartment("");
        $manager->persist($department);

        $manager->flush();
    }
}
