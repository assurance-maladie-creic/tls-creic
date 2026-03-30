<?php

namespace App\AutoMapper;

use App\DTO\TotalRessourcesFoyer12MoisDTO;
use App\Entity\Demande;
use ...;

class Ressources12MoisReverseMapper extends CustomMapper
{
    public function mapToObject($source, $destination): mixed
    {
        /** @var Demande */
        $demande = $source;
        /** @var TotalRessourcesFoyer12MoisDTO */
        $ressourcesDto = $destination;

        $ressourcesPerso = $demande->getRessourcesPerso12Mois();
        $ressourcesConjointe = $demande->getRessourcesConjointe12Mois();
        $ressourcesAutresMembres = $demande->getRessourcesAutresMembres12Mois();

        if ($ressourcesPerso !== null) {
            $ressourcesDto->ressources = (int) $ressourcesPerso->getAmount();
        }

        if ($ressourcesConjointe !== null) {
            $ressourcesDto->ressourcesConjointe = (int) $ressourcesConjointe->getAmount();
        }

        if ($ressourcesAutresMembres !== null) {
            $ressourcesDto->ressourcesAutresMembresFamille = (int) $ressourcesAutresMembres->getAmount();
        }

        return $demande;
    }
}
