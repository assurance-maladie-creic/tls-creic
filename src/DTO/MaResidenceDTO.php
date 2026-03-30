<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class MaResidenceDTO
{
    public HebergementDTO $hebergement;

    public AdresseDTO $adresse;

    public MonArriveeEnFranceDTO $monArriveeEnFrance;

    public function __construct()
    {
        $this->hebergement = new HebergementDTO();
        $this->adresse = new AdresseDTO();
        $this->monArriveeEnFrance = new MonArriveeEnFranceDTO();
    }
}
