<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user/{userHandle}', name: 'app_user')]
    public function index(): Response
    {
        
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
