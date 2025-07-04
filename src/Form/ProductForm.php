<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                // 'k' => 'v'
                // k : nom de l'option
                'attr' => [
                    // k => v
                    'placeholder' => 'Saisir le titre du produit',
                    'class' => 'bg-info'
                ],
                'label' => 'Titre<span class="text-danger">*</span>',
                'label_attr' => [
                    'class' => 'text-info'
                ],
                'label_html' => true,
                'help' => 'Le titre du produit doit être entre <span class="text-danger">5</span> et <span class="text-danger">30</span> caractères',
                'help_attr' => [
                    'class' => 'text-warning fst-italic'
                ],
                'help_html' => true,
                'row_attr' => [
                    'class' => 'border border-dark my-3 p-3'
                ],
                'required' => false,
                

            ])

            ->add('price', MoneyType::class, [
                //'currency' => 'USD'
            ])

            ->add('description', null, [

            ])


            //->add('ajouter', SubmitType::class)


            /*
                La méthode add() peut avoir 3 arguments 
                - 1e : nom de la propriété (STR) de l'entity (si form associé à une entity)
                - 2e : Nom de la class qui va définir le type de l'élément lien Types Reference Symfony
                - 3e : tableau des options, 
                la key dans le tableau est le nom de l'option que l'on retrouve dans la documentation symfony
                on peut distinguer 2 "styles" d'options, les communs et les propres à la class.

                Exemple : 
                Options inherited :
                label, attr, label_attr, required etc....



                Un élément/child du formulaire est composé de :
                    - label
                    - widget (input/select/textarea)
                    - help
                    - errors
                    => le tout est : row

            */
        ;

        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
