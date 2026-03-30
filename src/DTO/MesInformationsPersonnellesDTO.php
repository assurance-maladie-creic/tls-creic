<?php

namespace App\DTO;

use App\Entity\Pays;
use App\Enum\CiviliteEnum;
use DateTimeImmutable;
use ...;

class MesInformationsPersonnellesDTO
{
    /**
     * @psalm-var CiviliteEnum::*|null
     */
    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    public ?string $civilite = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\Length(max: 80)]
    #[Assert\Regex('/^[A-Z -\']*$/')]
    public ?string $nom = null;

    #[Assert\Length(max: 80)]
    #[Assert\Regex('/^[A-Z -\']*$/')]
    public ?string $nomDeNaissance = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\Length(max: 54)]
    #[Assert\Regex('/^[A-Z -\']*$/')]
    public ?string $prenom = null;

    #[Assert\NotBlank(message: 'MSG_ERR_FO_002')]
    #[Assert\LessThan('today', message: 'MSG_ERR_FO_005')]
    public ?DateTimeImmutable $dateNaissance = null;

    /**
     * @psalm-var Pays
     */
    public ?Pays $nationalite = null;
}
