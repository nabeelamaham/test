<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;



class AppFixtures extends Fixture implements FixtureGroupInterface
{
	    private UserPasswordHasherInterface $hasher;

	    public function __construct(UserPasswordHasherInterface $hasher)
	    {
	        $this->hasher = $hasher;
	    }
 
    public function load(ObjectManager $manager): void
    {

		for ($i = 0; $i < 20; $i++) {
            $user = new User();

 			$password = $this->hasher->hashPassword($user, '1234');		
            $user->setEmail('user '.$i. '@test.com');
            $user->setPassword($password);
            $user->setRoles([]);
            
            $manager->persist($user);
        }

        $manager->flush();
    }


     public static function getGroups(): array
     {
          return ['group1'];
     }
}
