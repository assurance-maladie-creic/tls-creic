<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=SituationDemandeurRepository::class, readOnly=true)
 * @ORM\Table(options={"comment": "La situation renseignée lors de la première demande"})
 */
class SituationDemandeur implements Stringable
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     * @Serializer\Groups({"demande_trace"})
     *
     * Le libellé sera utilisé pour réorienter le demandeur s'il ne dépend pas
     * du CREIC.
     */
    private $libelle;

    // ...

}
