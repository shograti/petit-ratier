<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\Repository\UserRepository;
use App\Repository\OfferRepository;
use App\Repository\AdviceRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminDashboardController extends AbstractController
{
    #[Route('/admin_dashboard/users', name: 'users_admin_dashboard')]

    public function getUsers(UserRepository $repo_user): Response
    {
        $users = $repo_user->findAll();
        return $this->render('admin_dashboard/users.html.twig', [
            'controller_name' => 'AdminDashboardController',
            'users' => $users,
        ]);
    }

    #[Route('/admin_dashboard/offers', name: 'offers_admin_dashboard')]

    public function getOffers(OfferRepository $repo_offer): Response
    {

        $offers = $repo_offer->findAll();
        return $this->render('admin_dashboard/offers.html.twig', [
            'controller_name' => 'AdminDashboardController',
            'offers' => $offers,
        ]);
    }

    #[Route('/admin_dashboard/shops', name: 'shops_admin_dashboard')]

    public function getCategories(ShopRepository $repo_shop): Response
    {
        $shops = $repo_shop->findAll();
        return $this->render('admin_dashboard/shops.html.twig', [
            'controller_name' => 'AdminDashboardController',
            'shops' => $shops,
            
            
        ]);
    }
}
