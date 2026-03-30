<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class PreInscriptionDTO
{
    public MonIdentiteDTO $monIdentite;

    public MaResidenceDTO $maResidence;

    public MonFoyerDTO $monFoyer;

    public UserDTO $user;

    public function __construct()
    {
        $this->monIdentite = new MonIdentiteDTO();
        $this->maResidence = new MaResidenceDTO();
        $this->monFoyer = new MonFoyerDTO();
        $this->user = new UserDTO();
    }
}
