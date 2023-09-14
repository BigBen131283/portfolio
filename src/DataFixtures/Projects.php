<?php

namespace App\DataFixtures;

use App\Entity\Projects as EntityProjects;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Projects extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        // $projects = [];

        // for($i = 0; $i < 20; $i++)
        // {
        //     $project = new EntityProjects();
        //     $createdAt = new DateTimeImmutable();
        //     $project->setName('Projet '.$i);
        //     $project->setUrl('http://nom_du_projet'.$i.'.com');
        //     $project->setDescription('Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dicta modi veniam dignissimos ad. Qui nemo architecto doloribus non? Dolor earum ducimus eaque laboriosam obcaecati itaque nobis cupiditate!');
        //     $project->setImage("https://picsum.photos/200/300");
        //     $project->setCreatedAt($createdAt);
            
        //     $manager->persist($project);
        //     $projects[] = $project;
        // }
        

        $manager->flush();
    }
}
