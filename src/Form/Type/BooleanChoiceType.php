<?php

namespace App\Form\Type;

use ...;

/**
 * @extends AbstractType<bool>
 */
class BooleanChoiceType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'form_type.boolean_choice.true' => true,
                'form_type.boolean_choice.false' => false,
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
