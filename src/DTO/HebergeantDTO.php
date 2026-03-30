<?php

namespace App\DTO;

use App\Entity\LienParente;
use App\Enum\CiviliteEnum;
use ...;

class HebergeantDTO
{
    /**
     * @psalm-var CiviliteEnum::*|null
     */
    #[Assert\NotBlank(groups: ['hebergeant'])]
    public ?string $civilite = null;

    #[Assert\NotBlank(groups: ['hebergeant'])]
    #[Assert\Length(max: 80, groups: ['hebergeant'])]
    #[Assert\Regex('/^[A-Z -]*$/', groups: ['hebergeant'])]
    public ?string $nom = null;

    #[Assert\NotBlank(groups: ['hebergeant'])]
    #[Assert\Length(max: 54, groups: ['hebergeant'])]
    #[Assert\Regex('/^[A-Z -]*$/', groups: ['hebergeant'])]
    public ?string $prenom = null;

    #[Assert\NotBlank(groups: ['hebergeant'])]
    public ?LienParente $lienParente = null;
}
