<?php

namespace App\Form;

use App\DTO\DemandeDataDTO;
use App\Entity\CodePostal;
use App\Service\MinimaSociauxManager;
use ...;

/**
 * @extends AbstractType<DemandeDataDTO>
 */
class DemandeEditType extends AbstractType
{
    public function __construct(
        private MinimaSociauxManager $minimaSociauxManager,
    ) {
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var CodePostal|null */
        $codePostal = $builder->getData()?->maResidence->adresse->codePostal; // verrue pour avoir les choix initiaux de la ville

        $builder
            ->add('monIdentite', MonIdentiteType::class, [
                'label' => 'form.pre_inscription.mon_identite_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
                'contexte' => $options['contexte'],
            ])
            ->add('maResidence', MaResidenceType::class, [
                'label' => 'form.pre_inscription.ma_residence_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
                'code_postal' => $codePostal,
            ])
            ->add('monFoyer', MonFoyerType::class, [
                'label' => 'form.pre_inscription.mon_foyer_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandeDataDTO::class,
            'contexte' => null,
            'validation_groups' => function (FormInterface $form): array {
                $groups = ['Default'];

                /** @var DemandeDataDTO */
                $data = $form->getData();

                // ...

                $minTroisMoisCentimes = $this->minimaSociauxManager->getMinimaSociauxTroisMoisCentimes();

                if ($data->monFoyer->ressourcesDeMonFoyer->totalRessourcesFoyer3mois->getTotal() < $minTroisMoisCentimes) {
                    $groups[] = 'ressourcesTroisMoisInsuffisantes';
                }

                return $groups;
            },
        ]);
    }
}
