<?php

namespace App\Controller;

use App\Entity\ListeVilles;
use App\Form\ListeVillesType;
use App\Repository\ListeVillesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/liste/villes')]
class ListeVillesController extends AbstractController
{
    #[Route('/', name: 'app_liste_villes_index', methods: ['GET'])]
    public function index(ListeVillesRepository $listeVillesRepository): Response
    {
        return $this->render('liste_villes/index.html.twig', [
            'liste_villes' => $listeVillesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_liste_villes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ListeVillesRepository $listeVillesRepository): Response
    {
        $listeVille = new ListeVilles();
        $form = $this->createForm(ListeVillesType::class, $listeVille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listeVillesRepository->save($listeVille, true);

            return $this->redirectToRoute('app_liste_villes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('liste_villes/new.html.twig', [
            'liste_ville' => $listeVille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_liste_villes_show', methods: ['GET'])]
    public function show(ListeVilles $listeVille): Response
    {
        return $this->render('liste_villes/show.html.twig', [
            'liste_ville' => $listeVille,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_liste_villes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ListeVilles $listeVille, ListeVillesRepository $listeVillesRepository): Response
    {
        $form = $this->createForm(ListeVillesType::class, $listeVille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listeVillesRepository->save($listeVille, true);

            return $this->redirectToRoute('app_liste_villes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('liste_villes/edit.html.twig', [
            'liste_ville' => $listeVille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_liste_villes_delete', methods: ['POST'])]
    public function delete(Request $request, ListeVilles $listeVille, ListeVillesRepository $listeVillesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listeVille->getId(), $request->request->get('_token'))) {
            $listeVillesRepository->remove($listeVille, true);
        }

        return $this->redirectToRoute('app_liste_villes_index', [], Response::HTTP_SEE_OTHER);
    }
}
