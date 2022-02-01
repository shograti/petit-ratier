<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryCreatorController extends AbstractController
{
    #[Route('/admin/categories', name: 'category_creator')]
    public function index(Request $request,EntityManagerInterface $manager,UserInterface $user ): Response
    {
        
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $offer->addIdUser($user);
            $manager->persist($category);
        }


        return $this->render('admin_dashboard/categories.twig', [
            'controller_name' => 'DashboardController',
            'form' => $form->createView()
        ]);
    }
}
