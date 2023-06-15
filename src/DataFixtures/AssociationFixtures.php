<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;

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
        // $association-> setPhone("0123456789");
        // $association-> setEmail("contact@utopia56.org");
        // $association-> setSlug("utopia-56-paris");
        $this->addReference(self::UTOPIA_56_PARIS, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Fondation Abbé Pierre") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("fondation-abbe-pierre.fr");
        $association-> setImageNameAsso("abbépierre-logo.png");
        // $association-> setPhone("0155563700"); 
        // $association-> setEmail("contactape@fap.fr");
        // $association-> setSlug("fondation-abbe-pierre");
        $this->addReference(self::FONDATION_ABBE_PIERRE, $association);
        $manager->persist($association);


        $association = new Association();
        $association-> setNameAsso("Croix-rouge française") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("croix-rouge.fr");
        $association-> setImageNameAsso("logo_croixrouge.jpg");
        // $association-> setPhone("0146363031");
        // $association-> setEmail("contactparis20@croixrouge.org");
        // $association-> setSlug("croix-rouge-française");
        $this->addReference(self::CROIX_ROUGE_FRANCAISE, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("ALC") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("association-alc.org");
        $association-> setImageNameAsso("alc-logo.png");
        // $association-> setPhone("0493524252");
        // $association-> setEmail("siege@association-alc.org");
        // $association-> setSlug("alc");
        $this->addReference(self::ALC, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("BAAM") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("baamasso.org");
        $association-> setImageNameAsso("baam-logo.jpg");
        // $association-> setPhone("0123456789");
        // $association-> setEmail("baam.asso@gmail.com");
        // $association-> setSlug("baam");
        $this->addReference(self::BAAM, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Bureaux du coeur") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("baamasso.org");
        $association-> setImageNameAsso("bureauxcoeur-logo.png");
        // $association-> setPhone("0102030405");
        // $association-> setEmail("contact@bureauxducoeur.org");
        // $association-> setSlug("bureau-du-coeur");
        $this->addReference(self::BUREAUX_DU_COEUR, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Info migrants") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("infomigrants.net/fr/");
        $association-> setImageNameAsso("info-migrants_logo.jpg");
        // $association-> setPhone("0120568489");
        // $association-> setEmail("contact@infomigrants.org");
        // $association-> setSlug("info-migrants");
        $this->addReference(self::INFO_MIGRANTS, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Samu social") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("www.samusocial.paris");
        $association-> setImageNameAsso("logo-samusocial.jpg");
        // $association-> setPhone("0141748484");
        // $association-> setEmail("contact@samusocial-75.fr");
        // $association-> setSlug("samu-social");
        $this->addReference(self::SAMU_SOCIAL, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("Aurore") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("aurore.asso.fr");
        $association-> setImageNameAsso("logo_aurore.png");
        // $association-> setPhone("0173000230");
        // $association-> setEmail("contact@aurore.fr");
        // $association-> setSlug("aurore");
        $this->addReference(self::AURORE, $association);
        $manager->persist($association);

        $association = new Association();
        $association-> setNameAsso("France Terre d'Asile") ;
        $association-> setDescriptionAsso("Lorem ipsum");
        $association-> setWebsiteUrl("france-terre-asile.org");
        $association-> setImageNameAsso("logo-ftda.png");
        // $association-> setPhone("0124252627");
        // $association-> setEmail("contact@franceterredasile.fr");
        // $association-> setSlug("france-terre-d-asile");
        $this->addReference(self::FRANCE_TERRE_D_ASILE, $association);
        $manager->persist($association);


        $manager->flush();
    }
}
