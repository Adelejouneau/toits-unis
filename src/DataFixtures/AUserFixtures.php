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


    public const SIDIBE_BINTOU = 'sidibe-bintou';
    public const SI_BACHIR_NASSIMA = 'si-bachir-nassima';
    public const DOE_JOHN = 'doe-john';
    public const SMITH_JANE = 'Smith-jane';
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setLastName('sidibe');
        $user->setFirstName('bintou');
        $user->setEmail('sidib.bintou@gmail.com');
        $user->setPhoneUser('06.11.22.33.41');
        $user->setImageNameUser('/public/images/user/profil1.jpg');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user->setIsVerified(true);
        $this->addReference(self::SIDIBE_BINTOU, $user);

        $manager->persist($user);

        $user = new User();
        $user->setLastName('SI-Bachir');
        $user->setFirstName('Nassima');
        $user->setEmail('bibi@bibi.com');
        $user->setPhoneUser('06.11.22.33.43');
        $user->setImageNameUser('/public/images/user/profil2.jpg');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setRoles(['ROLE_USER']);
        $user->setIsVerified(true);
        $this->addReference(self::SI_BACHIR_NASSIMA, $user);
        $manager->persist($user);


        $user= new User();
        $user->setLastName('Doe');
        $user->setFirstName('John');
        $user->setEmail('john.doe@example.com');
        $user->setPhoneUser('06.11.22.33.44');
        $user->setImageNameUser('/public/images/user/profil3.jpg');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setRoles(['ROLE_USER']);
        $this->addReference(self::DOE_JOHN, $user);
        $manager->persist($user);

        $user = new User();
        $user->setLastName('Smith');
        $user->setFirstName('Jane');
        $user->setEmail('   ');
        $user->setPhoneUser('06.11.22.33.42');
        $user->setImageNameUser('/public/images/user/profil4.jpg');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user->setRoles(['ROLE_USER']);
        $this->addReference(self::SMITH_JANE, $user);
        $manager->persist($user);


        $manager->flush();
    }
}
