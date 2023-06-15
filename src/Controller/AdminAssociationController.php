<?php

namespace App\Controller;

use App\Entity\Association;
use App\Form\AssociationType;
use App\Repository\AssociationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/association')]
class AdminAssociationController extends AbstractController
{
    #[Route('/', name: 'app_admin_association_index', methods: ['GET'])]
    public function index(AssociationRepository $associationRepository): Response
    {
        return $this->render('admin_association/index.html.twig', [
            'associations' => $associationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_association_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AssociationRepository $associationRepository, SluggerInterface $slugger): Response
    {
        $association = new Association();
        $form = $this->createForm(AssociationType::class, $association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $association->setslugAsso(strtolower($slugger->slug($association->getNameAsso())));
            $association->setnameAsso(ucfirst($association->getNameAsso()));
            $associationRepository->save($association, true);
            $this->addFlash('success',"l'\association".$association->getNameAsso().' a bien été ajouté.');
            return $this->redirectToRoute('app_admin_association_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_association/new.html.twig', [
            'association' => $association,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_association_show', methods: ['GET'])]
    public function show(Association $association): Response
    {
        return $this->render('admin_association/show.html.twig', [
            'association' => $association,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_association_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Association $association, AssociationRepository $associationRepository): Response
    {
        $form = $this->createForm(AssociationType::class, $association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $associationRepository->save($association, true);

            return $this->redirectToRoute('app_admin_association_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_association/edit.html.twig', [
            'association' => $association,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_association_delete', methods: ['POST'])]
    public function delete(Request $request, Association $association, AssociationRepository $associationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$association->getId(), $request->request->get('_token'))) {
            $associationRepository->remove($association, true);
        }

        return $this->redirectToRoute('app_admin_association_index', [], Response::HTTP_SEE_OTHER);
    }
}
