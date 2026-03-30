<?php

namespace App\Form;

use App\DTO\PreInscriptionDTO;
use App\Service\MinimaSociauxManager;
use ...;

/**
 * @extends AbstractType<PreInscriptionDTO>
 */
class PreInscriptionType extends AbstractType
{
    public function __construct(
        private MinimaSociauxManager $minimaSociauxManager,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('monIdentite', MonIdentiteType::class, [
                'label' => 'form.pre_inscription.mon_identite_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
                'formulaire' => 'pre-inscription',
            ])
            ->add('maResidence', MaResidenceType::class, [
                'label' => 'form.pre_inscription.ma_residence_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
            ])
            ->add('monFoyer', MonFoyerType::class, [
                'label' => 'form.pre_inscription.mon_foyer_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
            ])
            ->add('user', RegistrationFormType::class, [
                'label' => 'form.pre_inscription.user_label',
                'label_attr' => [
                    'class' => 'text-center text--primary am-font-narrow',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PreInscriptionDTO::class,
            'validation_groups' => function (FormInterface $form): array {
                $groups = ['Default'];

                /** @var PreInscriptionDTO */
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
