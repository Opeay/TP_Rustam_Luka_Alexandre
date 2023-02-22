<?php

namespace App\Controller;

use App\Entity\EmailAdresse;
use App\Form\EmailAdresseType;
use App\Repository\EmailAdresseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/email/adresse')]
class EmailAdresseController extends AbstractController
{
    #[Route('/', name: 'app_email_adresse_index', methods: ['GET'])]
    public function index(EmailAdresseRepository $emailAdresseRepository): Response
    {
        return $this->render('email_adresse/index.html.twig', [
            'email_adresses' => $emailAdresseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_email_adresse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmailAdresseRepository $emailAdresseRepository): Response
    {
        $emailAdresse = new EmailAdresse();
        $form = $this->createForm(EmailAdresseType::class, $emailAdresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailAdresseRepository->save($emailAdresse, true);

            return $this->redirectToRoute('app_email_adresse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email_adresse/new.html.twig', [
            'email_adresse' => $emailAdresse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_email_adresse_show', methods: ['GET'])]
    public function show(EmailAdresse $emailAdresse): Response
    {
        return $this->render('email_adresse/show.html.twig', [
            'email_adresse' => $emailAdresse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_email_adresse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EmailAdresse $emailAdresse, EmailAdresseRepository $emailAdresseRepository): Response
    {
        $form = $this->createForm(EmailAdresseType::class, $emailAdresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailAdresseRepository->save($emailAdresse, true);

            return $this->redirectToRoute('app_email_adresse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email_adresse/edit.html.twig', [
            'email_adresse' => $emailAdresse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_email_adresse_delete', methods: ['POST'])]
    public function delete(Request $request, EmailAdresse $emailAdresse, EmailAdresseRepository $emailAdresseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$emailAdresse->getId(), $request->request->get('_token'))) {
            $emailAdresseRepository->remove($emailAdresse, true);
        }

        return $this->redirectToRoute('app_email_adresse_index', [], Response::HTTP_SEE_OTHER);
    }
}
