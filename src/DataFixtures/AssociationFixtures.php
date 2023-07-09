<?php

namespace App\DataFixtures;
use App\Entity\Association;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;

class AssociationFixtures extends Fixture
{
    public const UTOPIA_56_PARIS='utopia-56-paris';
    public const FONDATION_ABBE_PIERRE='fondation-abbe-pierre';
    public const CROIX_ROUGE_FRANCAISE='croix-rouge-francaise';
    public const ALC='alc';
    public const BAAM='baam';
    public const BUREAUX_DU_COEUR='bureaux-du-coeur';
    public const INFO_MIGRANTS='info-migrants';
    public const SAMU_SOCIAL='samu-social';
    public const AURORE='aurore';
    public const FRANCE_TERRE_D_ASILE='france-terre-d-asile';
    

    public function load(ObjectManager $manager): void
    { 
        $association = new Association();
        $association-> setNameAsso("Utopia 56 Paris") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("utopia56.org");
        $association-> setImageNameAsso("logo-utopia.png");
        $association-> setPhoneNumberAsso("0123456789");
        $association-> setEmailAsso("contact@utopia56.org");
        $association-> setSlugAsso("utopia-56-paris");
        $this->addReference(self::UTOPIA_56_PARIS, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Fondation Abbé Pierre") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("fondation-abbe-pierre.fr");
        $association-> setImageNameAsso("abbépierre-logo.png");
        $association-> setPhoneNumberAsso("01.55.56.37.00");
        $association-> setEmailAsso("service.donateurs@fondation-abbe-pierre.fr");
        $association-> setSlugAsso("fondation-abbe-pierre");
        $this->addReference(self::FONDATION_ABBE_PIERRE, $association);
        $manager->persist($association);


        $association = new Association();
        $association-> setNameAsso("Croix-rouge française") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("croix-rouge.fr");
        $association-> setImageNameAsso("logo_croixrouge.jpg");
        $association-> setPhoneNumberAsso("01.46.36.30.31");
        $association-> setEmailAsso("contactparis20@croixrouge.org");
        $association-> setSlugAsso("croix-rouge-française");
        $this->addReference(self::CROIX_ROUGE_FRANCAISE, $association);
        $manager->persist($association);


        $association = new Association();
        $association-> setNameAsso("ALC") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("association-alc.org");
        $association-> setImageNameAsso("alc-logo.png");
        $association-> setPhoneNumberAsso("0493524252");
        $association-> setEmailAsso("siege@association-alc.org");
        $association-> setSlugAsso("alc");
        $this->addReference(self::ALC, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("BAAM") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("baamasso.org");
        $association-> setImageNameAsso("baam-logo.jpg");
        $association-> setPhoneNumberAsso("0123456789");
        $association-> setEmailAsso("baam.asso@gmail.com");
        $association-> setSlugAsso("baam");
        $this->addReference(self::BAAM, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Bureaux du coeur") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("baamasso.org");
        $association-> setImageNameAsso("bureauxcoeur-logo.png");
        $association-> setPhoneNumberAsso("0102030405");
        $association-> setEmailAsso("contact@bureauxducoeur.org");
        $association-> setSlugAsso("bureau-du-coeur");
        $this->addReference(self::BUREAUX_DU_COEUR, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Info migrants") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("infomigrants.net/fr/");
        $association-> setImageNameAsso("info-migrants_logo.jpg");
        $association-> setPhoneNumberAsso("0120568489");
        $association-> setEmailAsso("contact@infomigrants.org");
        $association-> setSlugAsso("info-migrants");
        $this->addReference(self::INFO_MIGRANTS, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Samu social") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("www.samusocial.paris");
        $association-> setImageNameAsso("logo-samusocial.jpg");
        $association-> setPhoneNumberAsso("0141748484");
        $association-> setEmailAsso("contact@samusocial-75.fr");
        $association-> setSlugAsso("samu-social");
        $this->addReference(self::SAMU_SOCIAL, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Aurore") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("aurore.asso.fr");
        $association-> setImageNameAsso("logo_aurore.png");
        $association-> setPhoneNumberAsso("0173000230");
        $association-> setEmailAsso("contact@aurore.fr");
        $association-> setSlugAsso("aurore");
        $this->addReference(self::AURORE, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("France Terre d'Asile") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("france-terre-asile.org");
        $association-> setImageNameAsso("logo-ftda.png");
        $association-> setPhoneNumberAsso("0124252627");
        $association-> setEmailAsso("contact@franceterredasile.fr");
        $association-> setSlugAsso("france-terre-d-asile");
        $this->addReference(self::FRANCE_TERRE_D_ASILE, $association);
        $manager->persist($association);

        $manager->flush();
    }
}
