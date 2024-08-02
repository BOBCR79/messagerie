<?php

namespace App\Controller;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{

    private $postList;


    public function __construct(private PostRepository $PostRepository)
    {

    }
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {

        $session = $request->getSession();
        $session->has('perPage')? $perPage = $session->get('perPage') : $perPage = 20;

        $postList = $this->PostRepository->fetchPaginatedPosts(0,$perPage);
        return $this->render('home/index.html.twig', [
            'messages' => $postList

        ]);
    }
}
