<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class MonIdentiteDTO
{
    public MesInformationsPersonnellesDTO $mesInformationsPersonnelles;

    public MaSituationDTO $maSituation;

    public MesInformationsDeContactDTO $mesInformationsDeContact;

    public function __construct()
    {
        $this->mesInformationsPersonnelles = new MesInformationsPersonnellesDTO();
        $this->maSituation = new MaSituationDTO();
        $this->mesInformationsDeContact = new MesInformationsDeContactDTO();
    }
}
