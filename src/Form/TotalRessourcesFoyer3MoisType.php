<?php

namespace App\Form;

use App\DTO\TotalRessourcesFoyer3MoisDTO;
use ...;

/**
 * @extends AbstractType<TotalRessourcesFoyer3MoisDTO>
 */
class TotalRessourcesFoyer3MoisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ressources', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_3_mois.ressources_label',
                'divisor' => 100,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputTroisMois',
                ],
            ])
            ->add('ressourcesConjointe', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_3_mois.ressources_conjointe_label',
                'divisor' => 100,
                'required' => false,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputTroisMois',
                ],
            ])
            ->add('ressourcesAutresMembresFamille', MoneyType::class, [
                'label' => 'form.total_ressources_foyer_3_mois.ressources_autres_membres_famille_label',
                'divisor' => 100,
                'required' => false,
                'attr' => [
                    'data-ressources-foyer-concealer-target' => 'inputTroisMois',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TotalRessourcesFoyer3MoisDTO::class,
        ]);
    }
}
