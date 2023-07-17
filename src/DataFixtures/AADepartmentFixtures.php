<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AADepartmentFixtures extends Fixture
{

    public const AIN='01 Ain';
    public const AISNE='02 Aisne';
    public const ALLIER='03 Allier';
    public const ALPES_DE_HAUTE_PROVENCE='04 Alpes-de-Haute-Provence';
    public const HAUTES_ALPES='05 Hautes-Alpes';
    public const ALPES_MARITIMES='06 Alpes-Maritimes';
    public const ARDECHE='07 Ardèche';
    public const ARDENNE='08 Ardènne';
    public const ARIEGE='09 Ariège';
    public const AUBE='10 Aube';
    public const AUDE='11 Aude';
    public const AVEYRON='12 Aveyron';
    public const BOUCHES_DU_RHONE='13 Bouches-du-Rhône';
    public const CALVADOS='14 Calvados';
    public const CANTAL='15 Cantal';
    public const CHARENTE='16 Charente';
    public const CHARENTE_MARITIME='17 Charente-Maritime';
    public const CHER='18 Cher';
    public const CORREZE='19 Corrèze';
    public const COTE_DOR='21 Côte-dOr';
    public const COTES_DARMOR='22 Côtes-dArmor';
    public const CREUSE='23 Creuse';
    public const DORDOGNE='24 Dordogne';
    public const DOUBS='25 Doubs';
    public const DROME='26 Drôme';
    public const EURE='27 Eure';
    public const EURE_ET_LOIR='28 Eure-et-Loir';
    public const FINISTERE='29 Finistère';
    public const GARD='30 Gard';
    public const HAUTE_GARONNE='31 Haute-Garonne';
    public const GERS='32 Gers';
    public const GIRONDE='33 Gironde';
    public const HERAULT='34 Hérault';
    public const ILLE_ET_VILAINE='35 Ille-et-Vilaine';
    public const INDRE='36 Indre';
    public const INDRE_ET_LOIRE='37 Indre-et-Loire';
    public const ISERE='38 Isère';
    public const JURA='39 Jura';
    public const LANDES='40 Landes';
    public const LOIR_ET_CHER='41 Loir-et-Cher';
    public const LOIRE='42 Loire';
    public const HAUTE_LOIRE='43 Haute-Loire';
    public const LOIRE_ATLANTIQUE='44 Loire-Atlantique';
    public const LOIRET='45 Loiret';
    public const LOT='46 Lot';
    public const LOT_ET_GARONNE='47 Lot-et-Garonne';
    public const LOZERE='48 Lozère';
    public const MAINE_ET_LOIRE='49 Maine-et-Loire';
    public const MANCHE='50 Manche';
    public const MARNE='51 Marne';
    public const HAUTE_MARNE='52 Haute-Marne';
    public const MAYENNE='53 Mayenne';
    public const MEURTHE_ET_MOSELLE='54 Meurthe-et-Moselle';
    public const MEUSE='55 Meuse';
    public const MORBIHAN='56 Morbihan';
    public const MOSELLE='57 Moselle';
    public const NIEVRE='58 Nièvre';
    public const NORD='59 Nord';
    public const OISE='60 Oise';
    public const ORNE='61 Orne';
    public const PAS_DE_CALAIS='62 Pas-de-Calais';
    public const PUY_DE_DOME='63 Puy-de-Dôme';
    public const PYRENEES_ATLANTIQUES='64 Pyrénées-Atlantiques';
    public const HAUTES_PYRENEES='65 Hautes-Pyrénées';
    public const PYRENEES_ORIENTALES='66 Pyrénées-Orientales';
    public const BAS_RHIN='67 Bas-Rhin';
    public const HAUT_RHIN='68 Haut-Rhin';
    public const RHONE='69 Rhône';
    public const HAUTE_SAONE='70 Haute-Saône';
    public const SAONE_ET_LOIRE='71 Saône-et-Loire';
    public const SARTHE='72 Sarthe';
    public const SAVOIE='73 Savoie';
    public const HAUTE_SAVOIE='74 Haute-Savoie';
    public const PARIS='75Paris';
    public const SEINE_MARITIME='76 Seine-Maritime';
    public const SEINE_ET_MARNE='77 Seine-et-Marne';
    public const YVELINES='78 Yvelines';
    public const DEUX_SEVRES='79 Deux-Sèvres';
    public const SOMME='80 Somme';
    public const TARN='81 Tarn';
    public const TARN_ET_GARONNE='82 Tarn-et-Garonne';
    public const VAR='83 Var';
    public const VAUCLUSE='84 Vaucluse';
    public const VENDEE='85 Vendée';
    public const VIENNE='86 Vienne';
    public const HAUTE_VIENNE='87 Haute-Vienne';
    public const VOSGES='88 Vosges';
    public const YONNE='89 Yonne';
    public const TERRITOIRE_DE_BELFORT='90 Territoire de Belfort';
    public const ESSONNE='91 Essonne';
    public const HAUTS_DE_SEINE='92 Hauts-de-Seine';
    public const SEINE_ST_DENIS='93 Seine-St-Denis';
    public const VAL_DE_MARNE='94 Val-de-Marne';
    public const VAL_DOISE='95 Val-Doise';


    public function load(ObjectManager $manager): void
    {
    
        $department = new Department();
        $department->setNameDepartment("01 Ain");
        $department->setCodeDepartment("01");
        $this->addReference(self::AIN, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("02 Aisne");
        $department->setCodeDepartment("02");
        $this->addReference(self::AISNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("03 Allier");
        $department->setCodeDepartment("03");
        $this->addReference(self::ALLIER, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("04 Alpes-de-Haute-Provence");
        $department->setCodeDepartment("04");
        $this->addReference(self::ALPES_DE_HAUTE_PROVENCE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("05 Hautes-Alpes");
        $department->setCodeDepartment("05");
        $this->addReference(self::HAUTES_ALPES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("06 Alpes-Maritimes");
        $department->setCodeDepartment("06");
        $this->addReference(self::ALPES_MARITIMES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("07 Ardèche");
        $department->setCodeDepartment("07");
        $this->addReference(self::ARDECHE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("08 Ardennes");
        $department->setCodeDepartment("08");
        $this->addReference(self::ARDENNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("09 Ariège");
        $department->setCodeDepartment("09");
        $this->addReference(self::ARIEGE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("10 Aube");
        $department->setCodeDepartment("10");
        $this->addReference(self::AUBE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("11 Aude");
        $department->setCodeDepartment("11");
        $this->addReference(self::AUDE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("12 Aveyron");
        $department->setCodeDepartment("12");
        $this->addReference(self:: AVEYRON, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("13 Bouches-du-Rhône");
        $department->setCodeDepartment("13");
        $this->addReference(self:: BOUCHES_DU_RHONE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("14 Calvados");
        $department->setCodeDepartment("14");
        $this->addReference(self:: CALVADOS, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("15 Cantal");
        $department->setCodeDepartment("15");
        $this->addReference(self:: CANTAL, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("16 Charente");
        $department->setCodeDepartment("16");
        $this->addReference(self:: CHARENTE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("17 Charente-Maritime");
        $department->setCodeDepartment("17");
        $this->addReference(self:: CHARENTE_MARITIME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("18 Cher");
        $department->setCodeDepartment("18");
        $this->addReference(self:: CHER, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("19 Corrèze");
        $department->setCodeDepartment("19");
        $this->addReference(self:: CORREZE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("21 Côte-d'Or");
        $department->setCodeDepartment("21");
        $this->addReference(self:: COTE_DOR, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("22 Côtes-d'Armor");
        $department->setCodeDepartment("22");
        $this->addReference(self:: COTES_DARMOR, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("23 Creuse");
        $department->setCodeDepartment("23");
        $this->addReference(self:: CREUSE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("24 Dordogne");
        $department->setCodeDepartment("24");
        $this->addReference(self:: DORDOGNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("25 Doubs");
        $department->setCodeDepartment("25");
        $this->addReference(self:: DOUBS, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("26 Drôme");
        $department->setCodeDepartment("26");
        $this->addReference(self:: DROME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("27 Eure");
        $department->setCodeDepartment("27");
        $this->addReference(self:: EURE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("28 Eure-et-Loir");
        $department->setCodeDepartment("28");
        $this->addReference(self:: EURE_ET_LOIR, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("29 Finistère");
        $department->setCodeDepartment("29");
        $this->addReference(self:: FINISTERE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("30 Gard");
        $department->setCodeDepartment("30");
        $this->addReference(self:: GARD, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("31 Haute-Garonne");
        $department->setCodeDepartment("31");
        $this->addReference(self:: HAUTE_GARONNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("32 Gers");
        $department->setCodeDepartment("32");
        $this->addReference(self:: GERS, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("33 Gironde");
        $department->setCodeDepartment("33");
        $this->addReference(self:: GIRONDE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("34 Hérault");
        $department->setCodeDepartment("34");
        $this->addReference(self:: HERAULT, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("35 Ille-et-Vilaine");
        $department->setCodeDepartment("35");
        $this->addReference(self:: ILLE_ET_VILAINE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("36 Indre");
        $department->setCodeDepartment("36");
        $this->addReference(self:: INDRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("37 Indre-et-Loire");
        $department->setCodeDepartment("37");
        $this->addReference(self:: INDRE_ET_LOIRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("38 Isère");
        $department->setCodeDepartment("38");
        $this->addReference(self:: ISERE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("39 Jura");
        $department->setCodeDepartment("39");
        $this->addReference(self:: JURA, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("40 Landes");
        $department->setCodeDepartment("40");
        $this->addReference(self:: LANDES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("41 Loir-et-Cher");
        $department->setCodeDepartment("41");
        $this->addReference(self:: LOIR_ET_CHER, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("42 Loire");
        $department->setCodeDepartment("42");
        $this->addReference(self:: LOIRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("43 Haute-Loire");
        $department->setCodeDepartment("43");
        $this->addReference(self:: HAUTE_LOIRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("44 Loire-Atlantique");
        $department->setCodeDepartment("44");
        $this->addReference(self:: LOIRE_ATLANTIQUE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("45 Loiret");
        $department->setCodeDepartment("45");
        $this->addReference(self:: LOIRET, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("46 Lot");
        $department->setCodeDepartment("46");
        $this->addReference(self:: LOT, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("47 Lot-et-Garonne");
        $department->setCodeDepartment("47");
        $this->addReference(self:: LOT_ET_GARONNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("48 Lozère");
        $department->setCodeDepartment("48");
        $this->addReference(self:: LOZERE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("49 Maine-et-Loire");
        $department->setCodeDepartment("49");
        $this->addReference(self:: MAINE_ET_LOIRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("50 Manche");
        $department->setCodeDepartment("50");
        $this->addReference(self:: MANCHE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("51 Marne");
        $department->setCodeDepartment("51");
        $this->addReference(self:: MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("52 Haute-Marne");
        $department->setCodeDepartment("52");
        $this->addReference(self:: HAUTE_MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("53 Mayenne");
        $department->setCodeDepartment("53");
        $this->addReference(self:: MAYENNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("54 Meurthe-et-Moselle");
        $department->setCodeDepartment("54");
        $this->addReference(self:: MEURTHE_ET_MOSELLE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("55 Meuse");
        $department->setCodeDepartment("55");
        $this->addReference(self:: MEUSE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("56 Morbihan");
        $department->setCodeDepartment("56");
        $this->addReference(self:: MORBIHAN, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("57 Moselle");
        $department->setCodeDepartment("57");
        $this->addReference(self:: MOSELLE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("58 Nièvre");
        $department->setCodeDepartment("58");
        $this->addReference(self:: NIEVRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("59 Nord");
        $department->setCodeDepartment("59");
        $this->addReference(self:: NORD, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("60 Oise");
        $department->setCodeDepartment("60");
        $this->addReference(self:: OISE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("61 Orne");
        $department->setCodeDepartment("61");
        $this->addReference(self:: ORNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("62 Pas-de-Calais");
        $department->setCodeDepartment("62");
        $this->addReference(self:: PAS_DE_CALAIS, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("63 Puy-de-Dôme");
        $department->setCodeDepartment("63");
        $this->addReference(self:: PUY_DE_DOME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("64 Pyrénées-Atlantiques");
        $department->setCodeDepartment("64");
        $this->addReference(self:: PYRENEES_ATLANTIQUES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("65 Hautes-Pyrénées");
        $department->setCodeDepartment("65");
        $this->addReference(self:: HAUTES_PYRENEES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("66 Pyrénées-Orientales");
        $department->setCodeDepartment("66");
        $this->addReference(self:: PYRENEES_ORIENTALES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("67 Bas-Rhin");
        $department->setCodeDepartment("67");
        $this->addReference(self:: BAS_RHIN, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("68 Haut-Rhin");
        $department->setCodeDepartment("68");
        $this->addReference(self:: HAUT_RHIN, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("69 Rhône");
        $department->setCodeDepartment("69");
        $this->addReference(self:: RHONE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("70 Haute-Saône");
        $department->setCodeDepartment("70");
        $this->addReference(self:: HAUTE_SAONE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("71 Saône-et-Loire");
        $department->setCodeDepartment("71");
        $this->addReference(self:: SAONE_ET_LOIRE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("72 Sarthe");
        $department->setCodeDepartment("72");
        $this->addReference(self:: SARTHE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("73 Savoie");
        $department->setCodeDepartment("73");
        $this->addReference(self:: SAVOIE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("74 Haute-Savoie");
        $department->setCodeDepartment("74");
        $this->addReference(self:: HAUTE_SAVOIE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("75 Paris");
        $department->setCodeDepartment("75");
        $this->addReference(self::PARIS, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("76 Seine-Maritime");
        $department->setCodeDepartment("76");
        $this->addReference(self:: SEINE_MARITIME, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("77 Seine-et-Marne");
        $department->setCodeDepartment("77");
        $this->addReference(self::SEINE_ET_MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("78 Yvelines");
        $department->setCodeDepartment("78");
        $this->addReference(self:: YVELINES, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("79 Deux-Sèvres");
        $department->setCodeDepartment("79");
        $this->addReference(self::DEUX_SEVRES , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("80 Somme");
        $department->setCodeDepartment("80");
        $this->addReference(self::SOMME , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("81 Tarn");
        $department->setCodeDepartment("81");
        $this->addReference(self::TARN , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("82 Tarn-et-Garonne");
        $department->setCodeDepartment("82");
        $this->addReference(self::TARN_ET_GARONNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("83 Var");
        $department->setCodeDepartment("83");
        $this->addReference(self::VAR , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("84 Vaucluse");
        $department->setCodeDepartment("84");
        $this->addReference(self::VAUCLUSE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("85 Vendée");
        $department->setCodeDepartment("85");
        $this->addReference(self::VENDEE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("86 Vienne");
        $department->setCodeDepartment("86");
        $this->addReference(self::VIENNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("87 Haute-Vienne");
        $department->setCodeDepartment("87");
        $this->addReference(self::HAUTE_VIENNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("88 Vosges");
        $department->setCodeDepartment("88");
        $this->addReference(self::VOSGES , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("89 Yonne");
        $department->setCodeDepartment("89");
        $this->addReference(self::YONNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("90 Territoire de Belfort");
        $department->setCodeDepartment("90");
        $this->addReference(self::TERRITOIRE_DE_BELFORT , $department);
        $manager->persist($department);


        $department = new Department();
        $department->setNameDepartment("91 Essonne");
        $department->setCodeDepartment("91");
        $this->addReference(self::ESSONNE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("92 Hauts-de-Seine");
        $department->setCodeDepartment("92");
        $this->addReference(self::HAUTS_DE_SEINE , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("93 Seine St Denis");
        $department->setCodeDepartment("93");
        $this->addReference(self::SEINE_ST_DENIS , $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("94 Val-de-Marne ");
        $department->setCodeDepartment("94");
        $this->addReference(self::VAL_DE_MARNE, $department);
        $manager->persist($department);

        $department = new Department();
        $department->setNameDepartment("95 Val-D'Oise ");
        $department->setCodeDepartment("95");
        $this->addReference(self::VAL_DOISE, $department);
        $manager->persist($department);


        $manager->flush();
    }
}
