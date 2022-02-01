<?php

namespace App\Controller;

use App\Repository\OfferRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(OfferRepository $offer_repo,CategoryRepository $category_repo): Response
    {
        $offers = $offer_repo->findAll();
        $category = $category_repo->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'offers' => $offers,
            'categories'=> $category
            
        ]);
    }
}
