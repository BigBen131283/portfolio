<?php

namespace App\DataFixtures;

use App\Entity\Users as EntityUsers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Users extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $users = [];
        // for($i=0; $i<5; $i++)
        // {
        //     $user = new EntityUsers;
        //     $user->setEmail('test'.$i.'@gmail.com');
        //     $user->setPassword('pwd');
        //     $user->setRoles(['ROLE_USER']);
    
        //     $manager->persist($user);
        //     $users[] = $user;
        // }

        $manager->flush();
    }
}
