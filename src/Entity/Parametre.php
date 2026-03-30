<?php

namespace App\Entity;

use ...;

/**
 * @ORM\Entity(repositoryClass=ParametreRepository::class)
 */
class Parametre extends BaseParameter
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $value;

    // ...

}
