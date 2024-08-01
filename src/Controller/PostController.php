<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/newpost', name: 'app_new_post')]
    public function index(): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        return $this->render('post/index.html.twig', [
            'post_form'=> $form
        ]);
    }
}
