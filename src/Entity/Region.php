<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class, readOnly=true)
 */
class Region
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
     */
    private $libelle;

    /**
     * @var Pays|null
     *
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="regions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

    // ...
    
}
