<?php

namespace App\Form;

use App\Entity\CodePostal;
use ...;

/**
 * @extends AbstractType<CodePostal>
 */
#[AsEntityAutocompleteField]
class CodePostalAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => CodePostal::class,
            'placeholder' => 'form_type.code_postal_autocomplete_field.placeholder',
            'choice_label' => 'code',
            'choice_translation_domain' => false,
            'searchable_fields' => ['code'],
            'preload' => false,
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
