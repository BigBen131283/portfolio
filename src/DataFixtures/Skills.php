<?php

namespace App\DataFixtures;

use App\Entity\Skills as EntitySkills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Skills extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'TypeScript', 'React', 'Angular'];

        // for($i=0; $i<count($skills); $i++){
        //     $skill = new EntitySkills;
        //     $skill->setLanguage($skills[$i]);
        //     $skill->setLogo("https://picsum.photos/200");
            
        //     $manager->persist($skill);

        // }

        $manager->flush();
    }
}
