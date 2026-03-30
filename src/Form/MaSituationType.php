<?php

namespace App\Form;

use App\DTO\MaSituationDTO;
use App\Entity\Pays;
use App\Entity\Region;
use App\Entity\SituationFamiliale;
use App\Form\Type\BooleanChoiceType;
use App\Repository\PaysRepository;
use ...;

/**
 * @extends AbstractType<MaSituationDTO>
 */
class MaSituationType extends AbstractType
{
    private ?string $formulaire;

    public function __construct(
        private RouterInterface $router,
        private PaysRepository $paysRepository,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('demandeurEmploi', BooleanChoiceType::class, [
                'label' => 'form.ma_situation.demandeur_emploi_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
            ->add('situationFamiliale', EntityType::class, [
                'label' => 'form.ma_situation.situation_famille_label',
                'class' => SituationFamiliale::class,
                'choice_label' => static function (SituationFamiliale $situationFamiliale): string {
                    return "entity.situationFamiliale.libelle.{$situationFamiliale->getLibelle()}";
                },
                'choice_translation_domain' => true,
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
            ])
            ->add('paysResidencePrecedent', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => static function (Pays $pays): string {
                    return "entity.pays.nom.{$pays->getCodeIso()}";
                },
                'choice_translation_domain' => true,
                'choices' => $this->paysRepository->getListWithAlphaOrder(false, false),
                'label' => 'form.ma_situation.pays_residence_precedent_label',
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'required' => true,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'pays-residence-precedent-select',
                    'data-controller' => 'fix-tom-select primary-tom-select',
                    'data-primary-tom-select-dependent-tom-select-outlet' => '.region-residence-precedente-select',
                ],
            ])
            ->add('regionResidencePrecedente', EntityType::class, [
                'label' => 'form.ma_situation.region_residence_precedente_label',
                'class' => Region::class,
                'choices' => [],
                'choice_label' => 'libelle',
                'choice_translation_domain' => false,
                'placeholder' => 'form.constants.BLANK_PLACEHOLDER',
                'required' => false,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'region-residence-precedente-select',
                    'data-controller' => 'fix-tom-select dependent-tom-select',
                    'data-dependent-tom-select-primary-tom-select-outlet' => '.pays-residence-precedent-select',
                    'data-dependent-tom-select-loader-url-value' => $this->router->generate('tom_select.regions_from_pays'),
                ],
            ])
        ;

        $this->formulaire = $options['formulaire'];

        // ...

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MaSituationDTO::class,
            'contexte' => null,
            'formulaire' => null,
        ]);
    }

    // ...

}
