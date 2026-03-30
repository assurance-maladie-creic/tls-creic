<?php

namespace App\Form;

use App\DTO\MesInformationsPersonnellesDTO;
use App\Form\Type\CiviliteType;
use App\Form\Type\PaysSelectionnableType;
use ...;

/**
 * @extends AbstractType<MesInformationsPersonnellesDTO>
 */
class MesInformationsPersonnellesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', CiviliteType::class, [
                'label' => 'form.mes_informations_personnelles.civilite_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
            ->add('nom', TextType::class, [
                'label' => 'form.mes_informations_personnelles.nom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'autocomplete' => 'family-name',
                    'maxlength' => '80'
                ],
            ])
            ->add('nomDeNaissance', TextType::class, [
                'label' => 'form.mes_informations_personnelles.nom_naissance_label',
                'transform_latin_uppercase' => true,
                'required' => false,
                'attr' => [
                    'autocomplete' => 'additional-name',
                    'maxlength' => '80'
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'form.mes_informations_personnelles.prenom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'autocomplete' => 'given-name',
                    'maxlength' => '54'
                ],
            ])
            ->add('dateNaissance', BirthdayType::class, [
                'label' => 'form.mes_informations_personnelles.date_naissance_label',
                'attr' => [
                    'autocomplete' => 'bday',
                ],
            ]);

        if ($options['contexte'] === "demande_creee_depuis_espace_personnel") {
            $builder
                ->add('nationalite', PaysSelectionnableType::class, [
                'label' => 'form.mes_informations_personnelles.nationalite_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ]);
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MesInformationsPersonnellesDTO::class,
            'contexte' => null,
        ]);
    }
}
