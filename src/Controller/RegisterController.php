<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Validator\Constraints\Date;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RegisterController extends AbstractController
{
    private $verifyEmailHelper;
    private $mailer;

    public function __construct(VerifyEmailHelperInterface $helper, MailerInterface $mailer)
    {
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
    }

    #[Route('/register', name: 'register')]
    public function createUser(UserPasswordHasherInterface $passwordHasher, Request $request, EntityManagerInterface $manager, MailerInterface $mailer, UserRepository $userRepository): Response
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
            //* Security Email //
            if ($userRepository->findOneBy(array('emailUser' => $user->getEmailUser())) == null) {
                $manager->flush();
                $signatureComponents = $this->verifyEmailHelper->generateSignature(
                    'registration_confirmation_route',
                    $user->getEmailUser(),
                    (string)$user->getIdUser(),
                    ['id' => $user->getIdUser()]
                );
                $email = new TemplatedEmail();
                $email->from('send@example.com');
                $email->to($user->getEmailUser());
                $email->htmlTemplate('register/confirmation_email.html.twig');
                $email->context(['signedUrl' => $signatureComponents->getSignedUrl()]);
                $this->mailer->send($email);
            } else {
                $this->addflash("error", "The Email allready exist");
                throw $this->createNotFoundException('The Email allready exists');
            }
        }
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            "form" => $form->createView(),
        ]);

    }

    #[Route('/auth/verify', name: 'registration_confirmation_route')]
    public function verifyUserEmail(Request $request, UserRepository $userRepository, EntityManagerInterface $manager): Response
    {
        $id = $request->get('id');
        // Verify the user id exists and is not null
        if (null === $id) {
            // User do not exist

            return $this->redirectToRoute('home');
        }
        $user = $userRepository->find($id);
        // Ensure the user exists in persistence
        if (null === $user) {
            return $this->redirectToRoute('home');
        }
        try {
            $this->verifyEmailHelper->validateEmailConfirmation($request->getUri(), $user->getIdUser(), $user->getEmailUser());
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('verify_email_error', $e->getReason());
        }
        $user->setRoleUser("ROLE_AUTHORIZED_USER");
        $this->addFlash('success', 'Your e-mail address has been verified.');
        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute('login');
    }
}
