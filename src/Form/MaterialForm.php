<?php

namespace App\Form;

use App\Entity\Material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'attr' => [
                    'placeholder' => 'Saisir le titre de la matière'
                ],
                'label' => 'Titre<span class="text-danger">*</span>',
                'label_attr' => [
                    'class' => 'text-info'
                ],
                'label_html' => true,
                'help' => 'Le titre de la matière doit être entre <span class="text-danger">5</span> et <span class="text-danger">30</span> caractères',
                'help_attr' => [
                    'class' => 'text-warning fst-italic'
                ],
                'help_html' => true,
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir le titre de la matière'
                    ]),
                    new Length([
                        'min' => 2,
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
            'data_class' => Material::class,
        ]);
    }
}
