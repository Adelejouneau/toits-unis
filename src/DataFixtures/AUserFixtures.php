<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AUserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public const FONDATION_ARMEE_DU_SALUT = 'fondation-armee-du-salut';
    public const SAMU_SOCIAL = 'Samu-social';
    public const ABBE_PIERRE = 'abbe-pierre';
    public const SECOURS_CATHOLIQUE = 'secours-catholique';
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("sidib.bintou@gmail.com");
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user->setNameAsso("fondation armee du salut");
        $user->setPhoneNumberAsso("0147234567");
        $user->setDescriptionAsso("Description de l'association");
        $user->setWebsiteUrl("https://www.fondationarmeedusalut.fr/");
        $user->setImageNameAsso('/public/images/asso/arméeDuSalut.png');
        $user->setSlugAsso('fondation-armee-du-salut');
        $user->setImmatriculationAsso("98765");
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setIsVerified(true);
        $this->addReference(self::FONDATION_ARMEE_DU_SALUT, $user);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("bibi@bibi.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNameAsso("Samu social");
        $user->setPhoneNumberAsso("56789");
        $user->setDescriptionAsso("Description de l'association");
        $user->setWebsiteUrl("https://www.samusocial.paris/");
        $user->setImageNameAsso('/public/images/asso/logo-samusocial.jpg');
        $user->setSlugAsso('Samu-social');
        $user->setImmatriculationAsso("46789");
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setIsVerified(true);
        $this->addReference(self::SAMU_SOCIAL, $user);
        $manager->persist($user);


        $user = new User();
        $user->setEmail("bi@bi.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNameAsso("abbe pierre");
        $user->setPhoneNumberAsso("12345");
        $user->setDescriptionAsso("Description de l'association");
        $user->setWebsiteUrl("https://www.fondation-abbepierre.fr/");
        $user->setImageNameAsso('/public/images/asso/abbépierre-logo.png');
        $user->setSlugAsso('abbe-pierre');
        $user->setImmatriculationAsso("12356");
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setIsVerified(true);
        $this->addReference(self::ABBE_PIERRE, $user);
        $manager->persist($user);

        $user = new User();
        $user->setEmail("Adele@descodeuses.com");
        $user->setRoles(['ROLE_USER']);
        $user->setNameAsso("secours catholique");
        $user->setPhoneNumberAsso("123456789");
        $user->setDescriptionAsso("Description de l'association");
        $user->setWebsiteUrl("https://www.secours-catholique.org/");
        $user->setImageNameAsso('/public/images/asso/secoursCatholique.png');
        $user->setSlugAsso('secours-catholique');
        $user->setImmatriculationAsso("65432");
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setIsVerified(true);
        $this->addReference(self::SECOURS_CATHOLIQUE, $user);
        $manager->persist($user);

        
        $manager->flush();
    }
}




            