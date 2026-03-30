<?php

namespace App\Entity;

use ...;

// ...
class CodePostal implements Stringable
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
     * @ORM\Column(type="string", length=5)
     */
    private $code;

    // ...

}
