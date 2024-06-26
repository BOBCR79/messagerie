<?php

namespace App\Controller;
use App\Repository\PostsRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $userList;
    private $commentList;
    private $likeList;
    private $postList;

    public function __construct(private PostsRepository $PostsRepository)
    {

    }


    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $postList = $this->PostsRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'messages' => $postList
        ]);
    }
   
}
