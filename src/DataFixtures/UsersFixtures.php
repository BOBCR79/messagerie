<?php
namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        for ($i=0; $i < 20; $i++) {
            $user = new Users();
            $user->setUsername('your_username');
            $user->setRoles(['ROLE_USER']);
            $user->setEmail('your@email.com');
            $user->setPassword('your_password');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
