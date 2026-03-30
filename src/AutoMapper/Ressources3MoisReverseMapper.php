<?php

namespace App\AutoMapper;

use App\DTO\TotalRessourcesFoyer3MoisDTO;
use App\Entity\Demande;
use ...;

class Ressources3MoisReverseMapper extends CustomMapper
{
    public function mapToObject($source, $destination): mixed
    {
        /** @var Demande */
        $demande = $source;
        /** @var TotalRessourcesFoyer3MoisDTO */
        $ressourcesDto = $destination;

        $ressourcesPerso = $demande->getRessourcesPerso3Mois();
        $ressourcesConjointe = $demande->getRessourcesConjointe3Mois();
        $ressourcesAutresMembres = $demande->getRessourcesAutresMembres3Mois();

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
