<?php

namespace App\Form;

use App\DTO\MaResidenceDTO;
use ...;

/**
 * @extends AbstractType<MaResidenceDTO>
 */
class MaResidenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hebergement', HebergementType::class, [
                'label' => 'form.ma_residence.hebergement_label',
                'label_attr' => [
                    'class' => 'text-center fs-4  text--primary-color',
                ],
            ])
            ->add('adresse', AdresseType::class, [
                'label' => 'form.ma_residence.adresse_label',
                'label_attr' => [
                    'class' => 'text-center fs-4  text--primary-color',
                ],
                'code_postal' => $options['code_postal'],
            ])
            ->add('monArriveeEnFrance', MonArriveeEnFranceType::class, [
                'label' => 'form.ma_residence.mon_arrivee_en_france_label',
                'label_attr' => [
                    'class' => 'text-center fs-4  text--primary-color',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MaResidenceDTO::class,
            'code_postal' => null,
        ]);
    }
}
