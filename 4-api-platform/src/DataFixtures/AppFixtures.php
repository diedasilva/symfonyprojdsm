<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {

    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("root");
        $user->setPassword($this->passwordEncoder->hashPassword($user, 'root'));
        $user->setRoles(["ROLE_ADMIN"]);
        
        $manager->persist($user);

        for($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@gmail.com');
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'password'));
            $user->setRoles(["ROLE_USER"]);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
