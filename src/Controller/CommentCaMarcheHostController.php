<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentCaMarcheHostController extends AbstractController
{
    #[Route('/comment/ca/marche/host', name: 'app_comment_ca_marche_host')]
    public function index(): Response
    {
        return $this->render('comment_ca_marche_host/index.html.twig', [
            'controller_name' => 'CommentCaMarcheHostController',
        ]);
    }
}