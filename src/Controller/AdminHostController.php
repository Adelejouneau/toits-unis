<?php

namespace App\Controller;

use App\Entity\Host;
use App\Form\HostType;
use App\Repository\HostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/host')]
class AdminHostController extends AbstractController
{
    #[Route('/', name: 'app_admin_host_index', methods: ['GET'])]
    public function index(HostRepository $hostRepository): Response
    {
        return $this->render('admin_host/index.html.twig', [
            'hosts' => $hostRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_host_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HostRepository $hostRepository): Response
    {
        $host = new Host();
        $form = $this->createForm(HostType::class, $host);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hostRepository->save($host, true);

            return $this->redirectToRoute('app_admin_host_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_host/new.html.twig', [
            'host' => $host,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_host_show', methods: ['GET'])]
    public function show(Host $host): Response
    {
        return $this->render('admin_host/show.html.twig', [
            'host' => $host,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_host_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Host $host, HostRepository $hostRepository): Response
    {
        $form = $this->createForm(HostType::class, $host);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hostRepository->save($host, true);

            return $this->redirectToRoute('app_admin_host_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_host/edit.html.twig', [
            'host' => $host,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_host_delete', methods: ['POST'])]
    public function delete(Request $request, Host $host, HostRepository $hostRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$host->getId(), $request->request->get('_token'))) {
            $hostRepository->remove($host, true);
        }

        return $this->redirectToRoute('app_admin_host_index', [], Response::HTTP_SEE_OTHER);
    }
}
