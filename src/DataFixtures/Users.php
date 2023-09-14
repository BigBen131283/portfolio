<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use App\Entity\Users as EntityUsers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Users extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $repo = $manager->getRepository(Skills::class);

        $skill = $repo->findOneBy([
            'language'=>'HTML',
        ]);

        for($i=0; $i<1; $i++)
        {
            $user = new EntityUsers();
            $user->setEmail('test'.$i.'@gmail.com');
            $user->setPassword('pwd');
            $user->setRoles(['ROLE_USER']);

            // $skill = new Skills();
            // $skill->setLanguage('HTML');
            // $skill->setLogo('https://picsum.photos/200');
            $user->addSkill($skill);
    
            $manager->persist($user);
        }

        $manager->flush();
    }
}
