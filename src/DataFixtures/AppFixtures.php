<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use App\Entity\Users;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function loadUsers(ObjectManager $manager): void
    {
        // $product = new Product();

        $users = [];
        
        for($i = 0 ; $i < 5; $i++){
            
            $user = new Users();
            $user->setEmail('user'.$i.'@mail'.$i.'.com');
            $user->setPassword('pwd');
            $user->setRoles(['ROLE_USER']);
            
            $manager->persist($user);
            $users[] = $user;
        }

        dd($users);
        
        $manager->flush();
    }
    
    // public function loadProjects(ObjectManager $manager): void
    // {
    //     $timeStamp = new DateTimeImmutable();
        
    //     for($i = 0 ; $i < 20; $i++){
    //         $project = new Projects();
    //         $project->setName('project'.$i);
    //         $project->setCreatedAt($timeStamp);
    //         $project->setImage();


    //         $manager->persist($project);
    //     }
    // }
}
