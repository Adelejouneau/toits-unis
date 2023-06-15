<?php

namespace App\Controller;

use App\Entity\Lodging;
use App\Form\LodgingType;
use App\Repository\LodgingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/lodging')]
class AdminLodgingController extends AbstractController
{
    #[Route('/', name: 'app_admin_lodging_index', methods: ['GET'])]
    public function index(LodgingRepository $lodgingRepository): Response
    {
        return $this->render('admin_lodging/index.html.twig', [
            'lodgings' => $lodgingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_lodging_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LodgingRepository $lodgingRepository, SluggerInterface $slugger): Response
    {
        $lodging = new Lodging();
        $form = $this->createForm(LodgingType::class, $lodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lodging->setSlugLod(strtolower($slugger->slug($lodging->getTitleLod())));
            $lodging->setTitleLod(ucfirst($lodging->getTitleLod()));
            $lodgingRepository->save($lodging, true);
            $this->addFlash('success','le logement a bien été ajouté');

            return $this->redirectToRoute('app_admin_lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_lodging/new.html.twig', [
            'lodging' => $lodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_lodging_show', methods: ['GET'])]
    public function show(Lodging $lodging): Response
    {
        return $this->render('admin_lodging/show.html.twig', [
            'lodging' => $lodging,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_lodging_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lodging $lodging, LodgingRepository $lodgingRepository): Response
    {
        $form = $this->createForm(LodgingType::class, $lodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lodgingRepository->save($lodging, true);

            return $this->redirectToRoute('app_admin_lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_lodging/edit.html.twig', [
            'lodging' => $lodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_lodging_delete', methods: ['POST'])]
    public function delete(Request $request, Lodging $lodging, LodgingRepository $lodgingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lodging->getId(), $request->request->get('_token'))) {
            $lodgingRepository->remove($lodging, true);
        }

        return $this->redirectToRoute('app_admin_lodging_index', [], Response::HTTP_SEE_OTHER);
    }
}
