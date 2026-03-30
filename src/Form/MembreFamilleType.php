<?php

namespace App\Form;

use App\DTO\MembreFamilleDTO;
use App\Entity\LienParente;
use App\Form\Type\CiviliteType;
use App\Form\Type\PaysSelectionnableType;
use ...;

/**
 * @extends AbstractType<MembreFamilleDTO>
 */
class MembreFamilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', CiviliteType::class, [
                'label' => 'form.membre_famille.civilite_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
            ->add('nom', TextType::class, [
                'label' => 'form.membre_famille.nom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'maxlength' => '80'
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'form.membre_famille.prenom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'maxlength' => '54'
                ],
            ])
            ->add('dateNaissance', DateType::class, [
                'label' => 'form.membre_famille.date_naissance_label',
            ])
            ->add('nationalite', PaysSelectionnableType::class, [
                'label' => 'form.membre_famille.nationalite_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'required' => false,
            ])
            ->add('lienParente', EntityType::class, [
                'label' => 'form.membre_famille.lien_parente_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'choice_label' => static function (LienParente $lienParente): string {
                    return "entity.lienParente.libelle.{$lienParente->getLibelle()}";
                },
                'choice_translation_domain' => true,
                'class' => LienParente::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MembreFamilleDTO::class,
        ]);
    }
}
