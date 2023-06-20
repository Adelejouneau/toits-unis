<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AAAUserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder = $encoder;

    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setLastName('sidibe');
        $user->setFirstName('bintou');
        $user->setEmailUser('sidib.bintou@gmail.com');
        $user->setPhoneUser('06.11.22.33.44');
        $user->setImageNameUser('lorem ipsem');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setGender('feminin');
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user-> setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user->setIsVerified(true);
        $user-> setAddress($this->getReference(AddressFixtures::CHARLES_DE_GAULLE_SAINT_HERBLAIN));
        $manager->persist($user);


        $user = new User();
        $user->setLastName('SI-Bachir');
        $user->setFirstName('Nassima');
        $user->setEmailUser('bibi@bibi.com');
        $user->setPhoneUser('06.11.22.33.44');
        $user->setImageNameUser('lorem ipsem');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setGender('feminin');
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        $user-> setRoles(['ROLE_USER']);
        $user->setIsVerified(true);
        $user-> setAddress($this->getReference(AddressFixtures::DOCTEUR_EMILE_ROUX_NICE));
        $manager->persist($user);

    

        $manager->flush();
    }
}
