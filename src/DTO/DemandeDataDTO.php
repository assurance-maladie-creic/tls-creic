<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class DemandeDataDTO
{
    public MonIdentiteDTO $monIdentite;

    public MaResidenceDTO $maResidence;

    public MonFoyerDTO $monFoyer;

    public function __construct()
    {
        $this->monIdentite = new MonIdentiteDTO();
        $this->maResidence = new MaResidenceDTO();
        $this->monFoyer = new MonFoyerDTO();
    }
}
