<?php

namespace App\Form\Type;

use ...;

/**
 * @extends AbstractType<string>
 */
class CiviliteType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'form_type.civilite.'.CiviliteEnum::FEMME => CiviliteEnum::FEMME,
                'form_type.civilite.'.CiviliteEnum::HOMME => CiviliteEnum::HOMME,
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
