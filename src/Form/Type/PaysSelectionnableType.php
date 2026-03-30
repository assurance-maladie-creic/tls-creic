<?php

namespace App\Form\Type;

use App\Entity\Pays;
use App\Repository\PaysRepository;
use ...;

/**
 * @extends AbstractType<Pays>
 */
class PaysSelectionnableType extends AbstractType
{
    public function __construct(
        private PaysRepository $paysRepository,
    ) {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => Pays::class,
            'choice_label' => static function (Pays $pays): string {
                return "entity.pays.nom.{$pays->getCodeIso()}";
            },
            'choice_translation_domain' => true,
            'choices' => $this->paysRepository->getListWithAlphaOrder(true, true),
        ]);
    }

    public function getParent(): string
    {
        return EntityType::class;
    }
}
