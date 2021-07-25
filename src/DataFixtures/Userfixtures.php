<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Userfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Renato');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$CMccvulouhXS78USwjlkQw$M6a10xrKs4DDrCMxjRl2+Jwqz9Ql6fIX+bzSDFHVBbI');
        $manager->persist($user);
        $manager->flush();
    }
}
