<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'attr' => [
                    'placeholder' => 'Saisir le titre de la catégorie'
                ],
                'label' => 'Titre<span class="text-danger">*</span>',
                'label_attr' => [
                    'class' => 'text-info'
                ],
                'label_html' => true,
                'help' => 'Le titre de la catégorie doit être entre <span class="text-danger">5</span> et <span class="text-danger">30</span> caractères',
                'help_attr' => [
                    'class' => 'text-warning fst-italic'
                ],
                'help_html' => true,
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir le titre de la catégorie'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Veuillez saisir un titre avec au minimum {{ limit }} caractères',
                        'max' => 30,
                        'maxMessage' => 'Veuillez saisir un titre avec au maximum {{ limit }} caractères'
                    ])
                ]
                

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
