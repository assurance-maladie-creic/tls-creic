<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=LienParenteRepository::class, readOnly=true)
 */
class LienParente implements Stringable
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
    private $libelle;

    // ...

}
