<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=SituationFamilialeRepository::class, readOnly=true)
 */
class SituationFamiliale implements Stringable
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
     */
    private $libelle;

    // ...

}
