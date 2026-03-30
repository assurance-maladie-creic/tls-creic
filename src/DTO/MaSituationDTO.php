<?php

namespace App\DTO;

use App\Entity\Pays;
use App\Entity\Region;
use App\Entity\SituationFamiliale;
use ...;

class MaSituationDTO
{
    #[Assert\NotNull(message: 'MSG_ERR_FO_002')]
    public ?bool $demandeurEmploi = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    public ?SituationFamiliale $situationFamiliale = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    public ?Pays $paysResidencePrecedent = null;

    #[Assert\NotBlank(groups: ['paysAvecRegion'])]
    public ?Region $regionResidencePrecedente = null;
}
