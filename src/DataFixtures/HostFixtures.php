<?php

namespace App\DataFixtures;

use App\Entity\Host;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HostFixtures extends Fixture
{

    public const JULIE_BOIS = "julie-bois";
    public const BRIGITTE_LALLOIS = "brigitte-lallois";
    public const AMAH_TRAORE = "amah-traoré";
    public const JEAN_MESSAN = "jean-messan";
    public const RENE_CHERQUAOUI = "rene-cherquaoui";
    public const RACHIDA_BELANOUF = "rachida-belanouf";
    public const BINTOU_SIDIBE = "bintou-sidibe";
    public const NASSIMA_SIBACHIR = "nassima-sibachir";
    public const DANIELLE_TANG = "danielle-tang";
    public const JEAN_MARIE = "jean-marie";
    public const ADELE_JOUNEAU = "adèle-jouneau";
    public const JEAN_ROBA = "jean-roba";


    public function load(ObjectManager $manager): void
    {

        $host = new Host();
        $host->setlastName("Jean");
        $host->setfirstName("Roba");
        $host->setphoneNumber("0606060606");
        $host->setEmail("jean-roba@gmail.com");
        $host->setAddress("1 rue de la paix");
        $host->setZipCode("75000");
        $host->setCity("Paris");
        $host->setEntreprise("La Poste");
        $host->setFonction("Directeur d'agence");
        $this->addReference(self::JEAN_ROBA, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Jouneau");
        $host->setfirstName("Adèle");
        $host->setphoneNumber("0606060606");
        $host->setEmail("adelejouneau@hotmail.fr");
        $host->setAddress("35 boulevard de la liberté");
        $host->setZipCode("34001");
        $host->setCity("Montpellier");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::ADELE_JOUNEAU, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Marie");
        $host->setfirstName("Jean");
        $host->setphoneNumber("0606060606");
        $host->setEmail("jeanmarie@aol.com");
        $host->setAddress("48 impasse des lilas");
        $host->setZipCode("84000");
        $host->setCity("Avignon");
        $host->setEntreprise("Hotel du Palais");
        $host->setFonction("Propriétaire");
        $this->addReference(self::JEAN_MARIE, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Sidibé");
        $host->setfirstName("Bintou");
        $host->setphoneNumber("0606060606");
        $host->setEmail("sidibintou@gmail.com");
        $host->setAddress("56 rue des écoles");
        $host->setZipCode("95230");
        $host->setCity("Soisy-sous-Montmorency");
        $host->setEntreprise("Digicode");
        $host->setFonction("Cheffe de projet");
        $this->addReference(self::BINTOU_SIDIBE, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Sibachir");
        $host->setfirstName("Nassima");
        $host->setphoneNumber("0606060606");
        $host->setEmail("nassibachir@outlook.fr");
        $host->setAddress("12 cours de la république");
        $host->setZipCode("33000");
        $host->setCity("Bordeaux");
        $host->setEntreprise("Crédit Agricole");
        $host->setFonction("Directrice d'agence");
        $this->addReference(self::NASSIMA_SIBACHIR, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Tang");
        $host->setfirstName("Danielle");
        $host->setphoneNumber("0606060606");
        $host->setEmail("danielle.tang@gmail.com");
        $host->setAddress("25 boulevard des capucines");
        $host->setZipCode("92000");
        $host->setCity("Nanterre");
        $host->setEntreprise("CréaProd");
        $host->setFonction("Directrice de production");
        $this->addReference(self::DANIELLE_TANG, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Belanouf");
        $host->setfirstName("Rachida");
        $host->setphoneNumber("0606060606");
        $host->setEmail("rachida.belnouf@hotmail.com");
        $host->setAddress("12 rue de la liberté");
        $host->setZipCode("30000");
        $host->setCity("Nîmes");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::RACHIDA_BELANOUF, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Cherquaoui");
        $host->setfirstName("René");
        $host->setphoneNumber("0606060606");
        $host->setEmail("rené.cherqa@yahoo.fr");
        $host->setAddress("123 impasse du soleil");
        $host->setZipCode("13000");
        $host->setCity("Marseille");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::RENE_CHERQUAOUI, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Messan");
        $host->setfirstName("Jean");
        $host->setphoneNumber("0606060606");
        $host->setEmail("jeanmessan@msn.com");
        $host->setAddress("89 rue du soleil");
        $host->setZipCode("75000");
        $host->setCity("Paris");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::JEAN_MESSAN, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Traoré");
        $host->setfirstName("Amah");
        $host->setphoneNumber("0606060606");
        $host->setEmail("amah.traore@gmail.com");
        $host->setAddress("127 boulevard du crépuscule");
        $host->setZipCode("79000");
        $host->setCity("Niort");
        $host->setEntreprise("PaperBack");
        $host->setFonction("Directeur général");
        $this->addReference(self::AMAH_TRAORE, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Bois");
        $host->setfirstName("Julie");
        $host->setphoneNumber("0606060606");
        $host->setEmail("juliebois@sanofi.fr");
        $host->setAddress("128 rue Gaston de Foix");
        $host->setZipCode("31000");
        $host->setCity("Toulouse");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::JULIE_BOIS, $host);
        $manager->persist($host);

        $host = new Host();
        $host->setlastName("Lallois");
        $host->setfirstName("Brigitte");
        $host->setphoneNumber("0606060606");
        $host->setEmail("famillelallois@gmail.com");
        $host->setAddress("158 cours des petits pas");
        $host->setZipCode("33000");
        $host->setCity("Bordeaux");
        $host->setEntreprise("");
        $host->setFonction("");
        $this->addReference(self::BRIGITTE_LALLOIS, $host);
        $manager->persist($host);

        $manager->flush();
    }
}
