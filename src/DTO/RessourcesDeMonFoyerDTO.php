<?php

namespace App\DTO;

use App\Validator as CustomAssert;
use ...;

#[Assert\Cascade]
#[CustomAssert\MontantTotalRessources]
class RessourcesDeMonFoyerDTO
{
    public TotalRessourcesFoyer3MoisDTO $totalRessourcesFoyer3mois;

    public TotalRessourcesFoyer12MoisDTO $totalRessourcesFoyer12mois;

    public function __construct()
    {
        $this->totalRessourcesFoyer3mois = new TotalRessourcesFoyer3MoisDTO();
        $this->totalRessourcesFoyer12mois = new TotalRessourcesFoyer12MoisDTO();
    }

    public function totalRessourcesEstSuffisant(int $minimumRessources3mois, int $minimumRessources12mois): bool
    {
        $total3mois = $this->totalRessourcesFoyer3mois->getTotal();

        if ($total3mois === null) {
            return false;
        }

        if ($total3mois >= $minimumRessources3mois) {
            return true;
        }

        $total12mois = $this->totalRessourcesFoyer12mois->getTotal();

        if ($total12mois === null) {
            return false;
        }

        if ($total12mois >= $minimumRessources12mois) {
            return true;
        }

        return false;
    }

    public function getTotal(): ?int
    {
        $total12mois = $this->totalRessourcesFoyer12mois->getTotal();

        if ($total12mois !== null) {
            return $total12mois;
        }

        return $this->totalRessourcesFoyer3mois->getTotal();
    }
}
