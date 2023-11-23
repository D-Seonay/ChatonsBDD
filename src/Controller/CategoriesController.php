<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }
    //action pour ajouter une categorie
    #[Route('/categories/ajouter', name: 'app_categories_ajouter')]
    public function ajouter(): Response
    {
        //création d'un formulaire
        //on créé un objet de la classe Categorie
        $categorie = new Categorie();
        //on créé un formulaire en utilisant la méthode createForm()
        $form = $this->createForm(CategorieType::class, $categorie);

        //todo : traiter le formulaire en retour

        


        return $this->render('categories/ajouter.html.twig', [
            'controller_name' => 'CategoriesController',
            'formulaire' => $form->createView()
        ]);
    }
}
