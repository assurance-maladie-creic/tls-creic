<?php

namespace App\Form;

use App\DTO\AdresseDTO;
use App\Entity\CodePostal;
use App\Entity\Ville;
use App\Repository\CodePostalRepository;
use ...;

/**
 * @extends AbstractType<AdresseDTO>
 */
class AdresseType extends AbstractType
{
    public function __construct(
        private RouterInterface $router,
        private CodePostalRepository $codePostalRepository,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var CodePostal|null */
        $codePostal = $options['code_postal'];

        $builder
            ->add('adresse', TextType::class, [
                'label' => 'form.adresse.adresse_label',
                'transform_latin_uppercase_keep_digits' => true,
                'attr' => [
                    'maxlength' => '255',
                ],
            ])
            ->add('complementAdresse1', TextType::class, [
                'label' => 'form.adresse.complement_adresse1_label',
                'transform_latin_uppercase_keep_digits' => true,
                'required' => false,
                'attr' => [
                    'maxlength' => '255',
                ],
            ])
            ->add('complementAdresse2', TextType::class, [
                'label' => 'form.adresse.complement_adresse2_label',
                'transform_latin_uppercase_keep_digits' => true,
                'required' => false,
                'attr' => [
                    'maxlength' => '255',
                ],
            ])
            ->add('codePostal', CodePostalAutocompleteField::class, [
                'label' => 'form.adresse.code_postal_label',
                'attr' => [
                    'class' => 'code-postal-select',
                    'data-controller' => 'fix-tom-select primary-tom-select',
                    'data-primary-tom-select-dependent-tom-select-outlet' => '.ville-select',
                    'maxlength' => '5',
                ],
            ])
            ->add('ville', EntityType::class, [
                'label' => 'form.adresse.ville_label',
                'class' => Ville::class,
                'choices' => $codePostal?->getVilles() ?? [],
                'choice_label' => 'nom',
                'choice_translation_domain' => false,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'ville-select',
                    'data-controller' => 'fix-tom-select dependent-tom-select',
                    'data-dependent-tom-select-primary-tom-select-outlet' => '.code-postal-select',
                    'data-dependent-tom-select-loader-url-value' => $this->router->generate('tom_select.ville_from_code_postal'),
                ],
            ])
        ;

        $builder->addEventListener(FormEvents::PRE_SUBMIT, [$this, 'ajoutChoixVille']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdresseDTO::class,
            'code_postal' => null,
        ]);
    }

    // ...

}
