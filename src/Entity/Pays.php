<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class, readOnly=true)
 */
class Pays
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
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=2)
     *
     * Code au format ISO 3166-1 alpha-2
     */
    private $codeIso;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default": false})
     *
     * Est-ce que la nationalité est sélectionnable lors d'une première
     * demande.
     */
    private $nationaliteSelectionnable = false;

    /**
     * @var Collection<int, Region>
     *
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="pays")
     */
    private $regions;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default": false})
     *
     * Est-ce que le pays est géré par le CREIC ou pas.
     */
    private $compatibleCreic = false;

    // ...

}
