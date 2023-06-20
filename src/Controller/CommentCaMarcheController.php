<?php

namespace App\Controller;

use App\Controller\CommentCaMarcheController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentCaMarcheController extends AbstractController
{
    #[Route('/comment/ca/marche', name: 'app_comment_ca_marche')]
    public function index(): Response
    {
        return $this->render('comment_ca_marche/index.html.twig', [
            'controller_name' => 'CommentCaMarcheController',
        ]);
    }
}
