<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity
 */
class Adresse
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
    private $adresse;

    /**
     * @var string|null
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse1;

    /**
     * @var string|null
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse2;

    /**
     * @var CodePostal
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\ManyToOne(targetEntity=CodePostal::class)
     */
    private $codePostal;

    /**
     * @var Ville
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\ManyToOne(targetEntity=Ville::class)
     */
    private $ville;

    //...

}
