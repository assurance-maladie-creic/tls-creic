<?php

namespace App\Form;

use App\DTO\HebergeantDTO;
use App\Entity\LienParente;
use App\Form\Type\CiviliteType;
use ...;

/**
 * @extends AbstractType<HebergeantDTO>
 */
class HebergeantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', CiviliteType::class, [
                'label' => 'form.hebergeant.civilite_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
            ->add('nom', TextType::class, [
                'label' => 'form.hebergeant.nom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'maxlength' => '80'
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'form.hebergeant.prenom_label',
                'transform_latin_uppercase' => true,
                'attr' => [
                    'maxlength' => '54'
                ],
            ])
            ->add('lienParente', EntityType::class, [
                'label' => 'form.hebergeant.lien_parente_label',
                'class' => LienParente::class,
                'choice_label' => static function (LienParente $lienParente): string {
                    return "entity.lienParente.libelle.{$lienParente->getLibelle()}";
                },
                'choice_translation_domain' => true,
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HebergeantDTO::class,
        ]);
    }
}
