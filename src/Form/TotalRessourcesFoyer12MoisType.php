<?php

namespace App\Form;

use App\DTO\TotalRessourcesFoyer12MoisDTO;
use ...;

/**
 * @extends AbstractType<TotalRessourcesFoyer12MoisDTO>
 */
class TotalRessourcesFoyer12MoisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ressources', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_12_mois.ressources_label',
                'divisor' => 100,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputDouzeMois',
                ],
            ])
            ->add('ressourcesConjointe', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_12_mois.ressources_conjointe_label',
                'divisor' => 100,
                'required' => false,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputDouzeMois',
                ],
            ])
            ->add('ressourcesAutresMembresFamille', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_12_mois.ressources_autres_membres_famille_label',
                'divisor' => 100,
                'required' => false,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputDouzeMois',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TotalRessourcesFoyer12MoisDTO::class,
        ]);
    }
}
