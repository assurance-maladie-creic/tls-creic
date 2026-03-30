<?php

namespace App\Form;

use App\DTO\MonArriveeEnFranceDTO;
use App\Form\Type\BooleanChoiceType;
use ...;

/**
 * @extends AbstractType<MonArriveeEnFranceDTO>
 */
class MonArriveeEnFranceType extends AbstractType
{
    /**
     * @var array<string, mixed>
     */
    public array $dependencies = [];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateArriveeTerritoire', DateType::class, [
                'label' => 'form.mon_arrivee_en_france.date_arrivee_france_label',
            ])
            ->add('couvertureMaladiePaysPrecedent', BooleanChoiceType::class, [
                'label' => 'form.mon_arrivee_en_france.couverture_maladie_pays_precedent_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'attr' => [
                    'data-controller' => 'boolean-concealer',
                    'data-action' => 'boolean-concealer#triggerConceal',
                    'data-boolean-concealer-concealable-outlet' => '.nom-organisme',
                ],
            ])
            ->add('nomOrganismeAssurantCouverture', TextType::class, [
                'label' => 'form.mon_arrivee_en_france.nom_organisme_assurant_couverture_label',
                'required' => false,
                'attr' => [
                    'class' => 'nom-organisme',
                    'data-controller' => 'concealable',
                    'maxlength' => '54',
                ],
                'label_attr' => [
                    'class' => 'nom-organisme',
                    'data-controller' => 'concealable',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MonArriveeEnFranceDTO::class,
        ]);
    }
}
