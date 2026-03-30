<?php

namespace App\AutoMapper;

use App\DTO\TotalRessourcesFoyer3MoisDTO;
use App\Entity\Demande;
use ...;

class Ressources3MoisMapper extends CustomMapper
{
    public function mapToObject($source, $destination): mixed
    {
        /** @var TotalRessourcesFoyer3MoisDTO */
        $ressourcesDto = $source;
        /** @var Demande */
        $demande = $destination;

        $ressources = $ressourcesDto->ressources;
        $ressourcesConjointe = $ressourcesDto->ressourcesConjointe;
        $ressourcesAutresMembresFamille = $ressourcesDto->ressourcesAutresMembresFamille;

        if ($ressources !== null) {
            $demande->setRessourcesPerso3Mois(Money::EUR($ressources));
        }

        if ($ressourcesConjointe !== null) {
            $demande->setRessourcesConjointe3Mois(Money::EUR($ressourcesConjointe));
        }

        if ($ressourcesAutresMembresFamille !== null) {
            $demande->setRessourcesAutresMembres3Mois(Money::EUR($ressourcesAutresMembresFamille));
        }

        return $demande;
    }
}
