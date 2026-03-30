<?php

namespace App\Form;

use App\DTO\LesPersonnesQuiMAccompagnentDTO;
use App\Form\Type\BooleanChoiceType;
use ...;

/**
 * @extends AbstractType<LesPersonnesQuiMAccompagnentDTO>
 */
class LesPersonnesQuiMAccompagnentType extends AbstractType
{
    /**
     * @var array<string, mixed>
     */
    public array $dependencies = [];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accompagneParFamille', BooleanChoiceType::class, [
                'label' => 'form.les_personnes_qui_m_accompagnent.accompagne_par_famille_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'attr' => [
                    'data-controller' => 'boolean-concealer',
                    'data-action' => 'change->boolean-concealer#triggerConceal',
                    'data-boolean-concealer-concealable-outlet' => '.membres-famille-form',
                ],
            ])
            ->add('membresFamille', CollectionType::class, [
                'label' => 'form.les_personnes_qui_m_accompagnent.membres_famille_label',
                'entry_options' => [
                    'label' => false,
                ],
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
                'entry_type' => MembreFamilleType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LesPersonnesQuiMAccompagnentDTO::class,
        ]);
    }
}
