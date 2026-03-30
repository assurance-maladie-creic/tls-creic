<?php

namespace App\Entity;

use App\Enum\CiviliteEnum;
use App\Enum\TypeCSSEnum;
use App\Enum\TypeNirEnum;
use DateTimeImmutable;
use ...;

/**
 * @ORM\Entity(repositoryClass=DemandeurRepository::class)
 */
class Demandeur
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
     * @var CiviliteEnum::*
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=30)
     */
    private $civilite;

    /**
     * @var string
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDeNaissance;

    /**
     * @var string
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @var DateTimeImmutable
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="date_immutable")
     */
    private $dateNaissance;

    // ...

}
