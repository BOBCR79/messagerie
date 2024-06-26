<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommentController extends AbstractController
{
    #[Route('/comment/post/{postId}', name: 'app_comment')]
    public function index(int $postId): Response
    {

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'parentPost' => $postId
        ]);
    }
}
