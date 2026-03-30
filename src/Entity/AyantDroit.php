<?php

namespace App\Entity;

use DateTimeImmutable;
use ...;

/**
 * @ORM\Entity(repositoryClass=AyantDroitRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class AyantDroit
{
    /**
     * @var int
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

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

    /**
     * @var LienParente
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\ManyToOne(targetEntity=LienParente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $lienParente;

    // ...
}
