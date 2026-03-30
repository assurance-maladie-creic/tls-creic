<?php

namespace App\DTO;

use App\Entity\LienParente;
use App\Entity\Pays;
use App\Enum\CiviliteEnum;
use DateTimeImmutable;
use ...;

class MembreFamilleDTO
{
    /**
     * @psalm-var CiviliteEnum::*|null
     */
    #[Assert\NotBlank(groups: ['membreFamille'])]
    public ?string $civilite = null;

    #[Assert\NotBlank(groups: ['membreFamille'])]
    #[Assert\Length(max: 80, groups: ['membreFamille'])]
    #[Assert\Regex('/^[A-Z -]+$/', groups: ['membreFamille'])]
    public ?string $nom = null;

    #[Assert\NotBlank(groups: ['membreFamille'])]
    #[Assert\Length(max: 54, groups: ['membreFamille'])]
    #[Assert\Regex('/^[A-Z -]+$/', groups: ['membreFamille'])]
    public ?string $prenom = null;

    #[Assert\NotBlank(groups: ['membreFamille'])]
    #[Assert\LessThan('today', message: 'MSG_ERR_FO_005', groups: ['membreFamille'])]
    public ?DateTimeImmutable $dateNaissance = null;

    public ?Pays $nationalite = null;

    #[Assert\NotBlank(groups: ['membreFamille'])]
    public ?LienParente $lienParente = null;
}
