<?php

namespace App\Entity;

// ...
use App\Enum\TypeDemandeEnum;
// ...
use ...;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\HasLifecycleCallbacks
 */
class Demande
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
     * @ORM\Column(type="string", length=15)
     */
    private $numero;

    /**
     * @var TypeDemandeEnum::*
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @var Adresse
     *
     * @Serializer\Groups({"demande_trace"})
     *
     * @ORM\OneToOne(targetEntity=Adresse::class, cascade={"persist"}, orphanRemoval=true)
     */
    private $adresse;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesPerso3MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesPerso3MoisCurrency;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesConjointe3MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesConjointe3MoisCurrency;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesAutresMembres3MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesAutresMembres3MoisCurrency;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesPerso12MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesPerso12MoisCurrency;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesConjointe12MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesConjointe12MoisCurrency;

    /**
     * @var string|null
     * @psalm-var numeric-string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressourcesAutresMembres12MoisAmount;

    /**
     * @var string|null
     * @psalm-var non-empty-string|null
     *
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $ressourcesAutresMembres12MoisCurrency;

    // ...
}
