<?php

namespace App\DTO;

use ...;

class TotalRessourcesFoyer12MoisDTO
{
    #[Assert\NotBlank(groups: ['ressourcesTroisMoisInsuffisantes'])]
    public ?int $ressources = null;

    public ?int $ressourcesConjointe = null;

    public ?int $ressourcesAutresMembresFamille = null;

    public function getTotal(): ?int
    {
        if ($this->isEmpty()) {
            return null;
        }

        return ($this->ressources ?? 0) + ($this->ressourcesConjointe ?? 0) + ($this->ressourcesAutresMembresFamille ?? 0);
    }

    private function isEmpty(): bool
    {
        return $this->ressources === null && $this->ressourcesConjointe === null && $this->ressourcesAutresMembresFamille === null;
    }
}
