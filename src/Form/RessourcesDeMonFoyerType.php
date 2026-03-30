<?php

namespace App\Form;

use App\DTO\RessourcesDeMonFoyerDTO;
use ...;

/**
 * @extends AbstractType<RessourcesDeMonFoyerDTO>
 */
class RessourcesDeMonFoyerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('totalRessourcesFoyer3mois', TotalRessourcesFoyer3MoisType::class, [
                'label' => 'form.ressources_de_mon_foyer.total_ressources_foyer_3_mois_label',
                'label_attr' => [
                    'class' => 'text-center fs-5',
                ],
            ])
            ->add('totalRessourcesFoyer12mois', TotalRessourcesFoyer12MoisType::class, [
                'label' => 'form.ressources_de_mon_foyer.total_ressources_foyer_12_mois_label',
                'label_attr' => [
                    'class' => 'text-center fs-5',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RessourcesDeMonFoyerDTO::class,
        ]);
    }
}
