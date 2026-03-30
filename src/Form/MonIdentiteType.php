<?php

namespace App\Form;

use App\DTO\MonIdentiteDTO;
use ...;

/**
 * @extends AbstractType<MonIdentiteDTO>
 */
class MonIdentiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mesInformationsPersonnelles', MesInformationsPersonnellesType::class, [
                'label' => 'form.mon_identite.mes_informations_personnelles_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
                'contexte' => $options['contexte'],
            ])
            ->add('maSituation', MaSituationType::class, [
                'label' => 'form.mon_identite.ma_situation_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
                'contexte' => $options['contexte'],
                'formulaire' => $options['formulaire'],
            ])
            ->add('mesInformationsDeContact', MesInformationsDeContactType::class, [
                'label' => 'form.mon_identite.mes_informations_de_contact_label',
                'label_attr' => [
                    'class' => 'text-center fs-4 text--primary-color',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MonIdentiteDTO::class,
            'contexte' => null,
            'formulaire' => null,
        ]);
    }
}
