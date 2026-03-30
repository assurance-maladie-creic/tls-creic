<?php

namespace App\AutoMapper;

use App\DTO\TotalRessourcesFoyer12MoisDTO;
use App\Entity\Demande;
use ...;

class Ressources12MoisMapper extends CustomMapper
{
    public function mapToObject($source, $destination): mixed
    {
        /** @var TotalRessourcesFoyer12MoisDTO */
        $ressourcesDto = $source;
        /** @var Demande */
        $demande = $destination;

        $ressources = $ressourcesDto->ressources;
        $ressourcesConjointe = $ressourcesDto->ressourcesConjointe;
        $ressourcesAutresMembresFamille = $ressourcesDto->ressourcesAutresMembresFamille;

        if ($ressources !== null) {
            $demande->setRessourcesPerso12Mois(Money::EUR($ressources));
        }

        if ($ressourcesConjointe !== null) {
            $demande->setRessourcesConjointe12Mois(Money::EUR($ressourcesConjointe));
        }

        if ($ressourcesAutresMembresFamille !== null) {
            $demande->setRessourcesAutresMembres12Mois(Money::EUR($ressourcesAutresMembresFamille));
        }

        return $demande;
    }
}
