<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;   
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(ManagerRegistry $registry): Response
    {
        $repository = $registry->getRepository(Categorie::class);
        $categories = $repository->findAll();

        return $this->render('categories/index.html.twig', [
            'categories' => $categories
        ]);
    }
    //action pour ajouter une categorie
    #[Route('/categories/ajouter', name: 'app_categories_ajouter')]
    public function ajouter(Request $request, ManagerRegistry $managerRegistry): Response
    {
        //création d'un formulaire
        //on créé un objet de la classe Categorie
        $categorie = new Categorie();
        //on créé un formulaire en utilisant la méthode createForm()
        $form = $this->createForm(CategorieType::class, $categorie);

        //todo : traiter le formulaire en retour
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //on récupère le manager de doctrine
            $manager = $managerRegistry->getManager();
            //on demande au manager de sauvegarder l'objet $categorie
            $manager->persist($categorie);
            //on demande au manager d'envoyer les requêtes SQL
            $manager->flush();
            //on redirige vers l'index des catégories
            return $this->redirectToRoute('app_categories');
        }


        return $this->render('categories/ajouter.html.twig', [
            'controller_name' => 'CategoriesController',
            'formulaire' => $form->createView()
        ]);
    }
}
