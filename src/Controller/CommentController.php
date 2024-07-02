<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommentController extends AbstractController
{
    public function __construct(private CommentsRepository $CommentsRepository)
    {

    }
    // TODO recup commentaires selon id, formulaire de nouveau commentaire
    #[Route('/comment/post/{postId}', name: 'app_comment')]
    public function index(int $postId): Response
    {
        $commentsList = $this->CommentsRepository->findBy(['post_id' => $postId]);

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'comments' => commentsList,
            'parentPost' => $postId
        ]);
    }
    
}
