<?php

namespace App\Controller;

use App\Entity\TypePersonne;
use App\Form\TypePersonneType;
use App\Repository\TypePersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/personne')]
class TypePersonneController extends AbstractController
{
    #[Route('/', name: 'app_type_personne_index', methods: ['GET'])]
    public function index(TypePersonneRepository $typePersonneRepository): Response
    {
        return $this->render('type_personne/index.html.twig', [
            'type_personnes' => $typePersonneRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_personne_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypePersonneRepository $typePersonneRepository): Response
    {
        $typePersonne = new TypePersonne();
        $form = $this->createForm(TypePersonneType::class, $typePersonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typePersonneRepository->save($typePersonne, true);

            return $this->redirectToRoute('app_type_personne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_personne/new.html.twig', [
            'type_personne' => $typePersonne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_personne_show', methods: ['GET'])]
    public function show(TypePersonne $typePersonne): Response
    {
        return $this->render('type_personne/show.html.twig', [
            'type_personne' => $typePersonne,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_personne_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypePersonne $typePersonne, TypePersonneRepository $typePersonneRepository): Response
    {
        $form = $this->createForm(TypePersonneType::class, $typePersonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typePersonneRepository->save($typePersonne, true);

            return $this->redirectToRoute('app_type_personne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_personne/edit.html.twig', [
            'type_personne' => $typePersonne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_personne_delete', methods: ['POST'])]
    public function delete(Request $request, TypePersonne $typePersonne, TypePersonneRepository $typePersonneRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typePersonne->getId(), $request->request->get('_token'))) {
            $typePersonneRepository->remove($typePersonne, true);
        }

        return $this->redirectToRoute('app_type_personne_index', [], Response::HTTP_SEE_OTHER);
    }
}
