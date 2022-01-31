<?php

namespace App\Controller;

use DateTime;
use App\Entity\Offer;
use App\Form\OfferType;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateOfferController extends AbstractController
{
    #[Route('/dashboard/create', name: 'create_offer')]
    public function creerOffer(Request $request,EntityManagerInterface $manager,/* UserInterface $user */): Response
    
    {
        $slugify = new Slugify();
        
        $offer = new Offer();
        $form = $this->createForm(OfferType::class,$offer);

        $form->handleRequest($request);
        
        if($form->isSubmitted()&& $form->isValid()){
            $offer->setSlugOffer($slugify->slugify($offer->getNameOffer()));
            $offer->setPostDate(new DateTime());

            //Placeholders

            /* $offer->setIdUser($user); */

            $offer->setIdType(1);
            $offer->setIdUser(1);
            $offer->setOsm(1);
            $offer->isvalideOffer(true);




            $manager->persist($offer);
            $manager->flush();
            return $this->redirectToRoute('dashboard');
        
        }
        return $this->render('user_dashboard/create-offer.html.twig', [
            'controller_name' => 'DashboardController',
            'form' => $form->createView(),
            
        ]);
    }
    
}
