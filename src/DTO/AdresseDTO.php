<?php

namespace App\DTO;

use App\Entity\CodePostal;
use App\Entity\Ville;
use ...;

class AdresseDTO
{
    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\Length(max: 255)]
    public ?string $adresse = null;

    #[Assert\Length(max: 255)]
    public ?string $complementAdresse1 = null;

    #[Assert\Length(max: 255)]
    public ?string $complementAdresse2 = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\Length(max: 5)]
    public ?CodePostal $codePostal = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    public ?Ville $ville = null;
}
