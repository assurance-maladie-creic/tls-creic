<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class MonFoyerDTO
{
    public LesPersonnesQuiMAccompagnentDTO $lesPersonnesQuiMAccompagnent;

    public RessourcesDeMonFoyerDTO $ressourcesDeMonFoyer;

    public function __construct()
    {
        $this->lesPersonnesQuiMAccompagnent = new LesPersonnesQuiMAccompagnentDTO();
        $this->ressourcesDeMonFoyer = new RessourcesDeMonFoyerDTO();
    }

    public function totalRessourcesEstSuffisant(int $minimumRessources3mois, int $minimumRessources12mois): bool
    {
        return $this->ressourcesDeMonFoyer->totalRessourcesEstSuffisant($minimumRessources3mois, $minimumRessources12mois);
    }
}
