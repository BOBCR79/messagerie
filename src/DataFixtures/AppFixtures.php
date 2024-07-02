<?php

namespace App\DataFixtures;
use App\Entity\Users;
use App\Entity\Comments;
use App\Entity\Posts;
use App\Entity\Likes;
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
            // $user->setId($i);
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

        $manager->flush();

        //création comments à partir de users et posts créés
        $postList = $manager->getRepository(Posts::class)->findAll();
        foreach($userList as $user){
            if (mt_rand(0,3) == 0){
                foreach ($postList as $post) {
                    if (mt_rand(0,4) == 0){
                        $comment = new Comments();
                        $comment->setUserId($user);
                        $comment->setContent($faker->paragraph);
                        $comment->setPostId($post);
                        $manager->persist($comment);
                    }
                }
            }

        };
        $manager->flush();

        $commentList = $manager->getRepository(Comments::class)->findAll();
        //création likes
        foreach($userList as $user){
            if (mt_rand(0,3) == 0){
                foreach ($postList as $post) {
                    if (mt_rand(0,4) == 0){
                        $postLike = new Likes();
                        $postLike->setUserId($user);
                        $postLike->setPostId($post);
                        $manager->persist($postLike);
                    }elseif (mt_rand(0,4) == 4){

                        foreach ($commentList as $comment) {
                            if (mt_rand(0,4) == 0){
                                $commentLike = new Likes();
                                $commentLike->setUserId($user);
                                $commentLike->setCommentId($comment);
                                $manager->persist($commentLike);
                            }
                        }
                    }

                }
            }
        };


        $manager->flush();
    }
}
