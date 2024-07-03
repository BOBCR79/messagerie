<?php

namespace App\Controller;
use App\Repository\CommentsRepository;
use App\Entity\Comments;
use App\Form\CommentType;
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

        //TODO verif si user connecte, si non, masquer inputs

        $commentsList = $this->CommentsRepository->fetchComments($postId);

        $comment = new Comments();
        $form = $this->createForm(CommentType::class, $comment);


        $form->handleRequest($request);
        if ($form->isSubmited() && $form->isValid())
        {
           //TODO insertion, persist & flush
        }

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'comments' => $commentsList,
            'parentPost' => $postId,
            'comment_form' => $form
        ]);
    }
    
}
