<?php

namespace App\DataFixtures;
use App\Entity\Users;
use App\Entity\Comments;
use App\Entity\Posts;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $numberCreated = 50;
        $newUsersList = [];
        //creation users
        for ($i=0; $i < $numberCreated; $i++) {
            $user = new Users();
            $user->setUsername($faker->userName);
            $user->setRoles(['ROLE_USER']);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $user->setId($i);
            $manager->persist($user);
        }
        $manager->flush();


        $userList = $manager->getRepository(Users::class)->findAll();


        //création posts
        $maxPosts = 5;
        foreach($userList as $user){
            $nbPosts = mt_rand(0,$maxPosts);
            for ($i=0; $i < $nbPosts; $i++) {
                $post = new Posts();
                $post->setContent($faker->paragraph);
                $post->setUserId($user);
                $manager->persist($post);
            }
        };

        $maxComments = 3;
        //création comments
        foreach($userList as $user){

        };

        //création likes
        foreach($userList as $user){

        };


        $manager->flush();
    }
}
