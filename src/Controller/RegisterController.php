<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function createUser(UserPasswordHasherInterface $passwordHasher, Request $request, EntityManagerInterface $manager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hashedpassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPasswordUser($hashedpassword);
            $user->setRegisterDateUser(new Datetime());
            $user->setDistanceUser(0);
            $user->setPosxUser(0);
            $user->setPosyUser(0);
            $user->setRatingUser(0);
            $user->setRoleUser("ROLE_USER");
            $manager->persist($user);
        }
       //* if (security verification)
        //* TO DO VERIFICATION SINGLE USER IN DB

        $manager->flush();
        //*Signaturecomponent Email send
        //* TO DO

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            "form" => $form->createView(),
        ]);
    }
}
