<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Role;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(EntityManagerInterface $em,Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        
        $roles=$em->getRepository(Role::class)->findBy([],['rang'=>'asc']);
        
        foreach($roles as $role){
            $libelle=$role->getLibelle();
            $choice_roles[$libelle]=$libelle;
        }
        $choice_roles=[];

        $form = $this->createForm(UserType::class, $user);
        $form
        ->add('roles',ChoiceType::class,[
            'multiple'=>true,
            'choices'=>$choice_roles,
            'label'=>'Roles',
            'attr'=>['class'=>'form-control my-2 w-20 auto text-center']
            ])
        ->add('password',PasswordType::class,[
            'mapped'=>false,
            'label'=>'Mot de passe',
            'required'=>false,
            'attr'=>['class'=>'form-control my-2 w-20 auto text-center ','placeholder'=>"Ne rien taper pour garder l'ancien"]
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(EntityManagerInterface $em,Request $request,$id=0, UserRepository $userRepository): Response
    {
        if($id){
            $user=$em->getRepository(User::class)->find($id);
        }else{
            $user=new User;
        }
        $roles=$em->getRepository(Role::class)->findBy([],['rang'=>'asc']);
        $choice_roles=[];
        foreach($roles as $role){
            $libelle=$role->getLibelle();
            $choice_roles[$libelle]=$libelle;
        }

        $form = $this->createForm(UserType::class, $user);
        $form
        ->add('roles',ChoiceType::class,[
            'multiple'=>true,
            'choices'=>$choice_roles,
            'label'=>'Roles',
            'attr'=>['class'=>'form-control my-2 w-20 auto text-center']
            ])
        ->add('password',PasswordType::class,[
            'mapped'=>false,
            'label'=>'Mot de passe',
            'required'=>false,
            'attr'=>['class'=>'form-control my-2 w-20 auto text-center ','placeholder'=>"Ne rien taper pour garder l'ancien"]
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $pwd=$form->get('pwd')->getData();
            // if($pwd){
            //     // $password=$encoder->encodePassword($user,$pwd);
            //     // $user->setPassword($password);
            // }

            $userRepository->add($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);

    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
