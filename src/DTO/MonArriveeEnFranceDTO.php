<?php

namespace App\DTO;

use App\Validator as CustomAssert;
use DateTimeImmutable;
use ...;

class MonArriveeEnFranceDTO
{
    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\LessThan('today', message: 'MSG_ERR_FO_006')]
    #[CustomAssert\DateArrivee]
    public ?DateTimeImmutable $dateArriveeTerritoire = null;

    #[Assert\NotNull(message: 'MSG_ERR_FO_002')]
    public ?bool $couvertureMaladiePaysPrecedent = null;

    #[Assert\Length(max: 54)]
    public ?string $nomOrganismeAssurantCouverture = null;
}
