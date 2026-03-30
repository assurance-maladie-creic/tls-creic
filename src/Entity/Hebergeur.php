<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=HebergeurRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Hebergeur
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
    private $prenom;

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
