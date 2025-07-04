<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductForm;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProductController extends AbstractController
{
    #[Route('/produit/afficher', name:'app_product_index')]
    public function index(ProductRepository $productRepository): Response
    {
        /*
            Lorsqu'une entity est créée, son repository est généré également
            entity = table
            repository = requête SELECT
        */

        $products = $productRepository->findAll();

        //dd($products);

        /*
            Dans tous les repository, il existe 4 méthodes par défaut :
            - findAll() : return []
            - findBy() : return []
            - find() : return Objet Product or NULL
            - findOneBy() : return Objet Product or NULL

            ProductRepository : SELECT ........ FROM product ......
            1- findAll() : SELECT * FROM product


            3- find(int $id) : SELECT * FROM product WHERE id = $id
        */
       return $this->render('product/index.html.twig', [
        'products' => $products
       ]);
    }

    #[Route('/produit/ajouter', name:'app_product_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        /*
            La méthode new() dépend de 2 objets, sans ces 2 derniers la route pour ajouter un produit ne peut pas fonctionner,
            on définit les dépendances dans les parenthèses de la méthode

            syntaxe : Class $objet, Class2 $objet2

        */
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

        // Traitement du formulaire
        $form->handleRequest($request);

        dump($form);
        /*
            Si le formulaire a été soumis et validé (constraints)
        */
        if ($form->isSubmitted() && $form->isValid()) {
            dump($product);

            // EntityManagerInterface est la class qui permet d'exécuter les 3 requètes :
            // INSERT INTO
            // UPDATE
            // DELETE


            // INSERTION EN BASE DE DONNÉES
            $entityManager->persist($product);
            $entityManager->flush();

            //dd($product);

            // notification


            // redirection
            /*
                La méthode redirectToRoute() permet de faire des redirections internes
                1e argument (obligatoire) - type : string ==> Nom de la route (attribut name) 
                2e argument (facultatif)  - type : array  ==> tableau des paramètres
            */
            return $this->redirectToRoute('app_product_index');
        }


        return $this->render('product/new.html.twig', [
           'formProduct' => $form->createView() 
        ]);
    }




    
}
