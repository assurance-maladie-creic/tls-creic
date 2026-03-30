<?php

namespace App\Form;

use App\DTO\HebergementDTO;
use App\Form\Type\BooleanChoiceType;
use ...;

/**
 * @extends AbstractType<HebergementDTO>
 */
class HebergementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rejointPersonneInstalleeEnFrance', BooleanChoiceType::class, [
                'label' => 'form.hebergement.rejoint_personne_installee_en_france_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'attr' => [
                    'data-controller' => 'boolean-concealer',
                    'data-action' => 'change->boolean-concealer#triggerConceal',
                    'data-boolean-concealer-concealable-outlet' => '.hebergeant-form',
                ],
            ])
            ->add('hebergeant', HebergeantType::class, [
                'label' => 'form.hebergement.hebergeant_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
                'row_attr' => [
                    'data-controller' => 'concealable',
                    'class' => 'hebergeant-form',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HebergementDTO::class,
        ]);
    }
}
