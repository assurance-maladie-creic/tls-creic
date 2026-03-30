<?php

namespace App\Form;

use App\DTO\MesInformationsDeContactDTO;
use ...;

/**
 * @extends AbstractType<MesInformationsDeContactDTO>
 */
class MesInformationsDeContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroTelephoneMobile', TelType::class, [
                'label' => 'form.mes_informations_de_contact.tel_mobile_label',
                'required' => false,
                'attr' => [
                    'autocomplete' => 'tel-national',
                ],
            ])
            ->add('numeroTelephoneFixe', TelType::class, [
                'label' => 'form.mes_informations_de_contact.tel_fixe_label',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MesInformationsDeContactDTO::class,
        ]);
    }
}
