<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProductController extends AbstractController
{
    #[Route('/produit/afficher', name:'app_product_index')]
    public function index(): Response
    {
       return $this->render('product/index.html.twig');
    }

    #[Route('/produit/ajouter', name:'app_product_new')]
    public function new(): Response
    {
        // Création d'une instance/objet de la class (Entity) Product
        $product = new Product();
        dump($product);

        /*
            La méthode createForm() provenant de la class AbstractController
            permet de créer un formulaire 
            1- argument : nom de la class dans laquelle se trouve le builder
            2- argument : objet issu de l'entity sur laquelle le formulaire a été créée

            Cette méthode retourne un objet issu de la class FormInterface
        */
        $form = $this->createForm(ProductForm::class, $product);


        return $this->render('product/new.html.twig', [
           'formProduct' => $form->createView() 
        ]);
    }




    
}
