<?php

namespace App\Controller; // App = dossier "src"

// Importations
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// final = class qui ne peut pas être héritée
final class HomeController extends AbstractController // Extends = hériter
{
    /*
        Dans l'attribut Route, on y trouve la configuration
        - 1e argument (sans nom de paramètre/attribut : pas de terme en bleu) : la route (ce qu'on retrouve dans l'URL)
            Serveur + route
            exemple :
                en local :
                    127.0.0.1:8000/home 
                en ligne :
                    www.nomDeDomaine.fr/home

        - 2e argument : le nom (name) de la route 
            => lien et redirection


    */
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        /*
            La méthode render() qui provient de la class AbstractController permet de rendre une vue, 
            La route retourne une vue c'est-à-dire un fichier html.twig
            La méthode render() a 2 arguments :
                - 1e (obligatoire) - type : string : le nom du fichier html.twig
                Pour info, la méthode render() se positionne à la racine du dossier 'templates'
                - 2e (facultatif) - type : array : tableau des données à véhiculer sur le template
        */
        
        $firstNameController = 'louis';
        /*
            DEBUG :
            - dump() : visible dans le Symfony Profiler (barre des tâches noire située en bas de l'écran)
            - dd() qui signifie dump(); die(); le code après le die() n'est pas exécuté

            Pour info le Symfony Profiler est présent uniquement quand le projet est en environnement 'dev'
            En prod (pour la mise en ligne), il n'est pas présent ainsi que les erreurs 'rouges' de Symfony
            /!\ retirer bien tous les dumps lors du passage en ligne
        */
        
        //dump($firstNameController);
        
        $fruits = ['kiwi', 'fraise', 'banane', 'orange'];
        //dump($fruits);die;
        //dd($fruits);


        return $this->render('home/index.html.twig', [
            // k => v
            // k sera le terme récupéré en twig
            // v sera le terme récupéré dans la méthode du controller
            'firstNameTwig' => $firstNameController,
            'fruits' => $fruits
        ]);
    }


    #[Route("/catalogue", name:"app_catalog")]
    public function catalog(): Response
    {

        return $this->render('home/catalog.html.twig', []);
    } 








} //---------------------------- Fermeture de la class HomeController


