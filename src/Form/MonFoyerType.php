<?php

namespace App\Form;

use App\DTO\MonFoyerDTO;
use ...;

/**
 * @extends AbstractType<MonFoyerDTO>
 */
class MonFoyerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lesPersonnesQuiMAccompagnent', LesPersonnesQuiMAccompagnentType::class, [
                'label' => 'form.mon_foyer.les_personnes_qui_m_accompagnent_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
            ])
            ->add('ressourcesDeMonFoyer', RessourcesDeMonFoyerType::class, [
                'label' => 'form.mon_foyer.ressources_de_mon_foyer_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MonFoyerDTO::class,
        ]);
    }
}
