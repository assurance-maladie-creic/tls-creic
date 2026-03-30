<?php

namespace App\DTO;

use DateTimeImmutable;
use ...;

class StatistiquesDTO
{
    /**
     * @var DateTimeImmutable
     *
     * @Assert\NotBlank
     */
    public $dateDebut;
    /**
     * @var DateTimeImmutable
     *
     * @Assert\NotBlank
     * @Assert\LessThanOrEqual("-2 days", message="MSG_ERR_BO_035")
     */
    public $dateFin;
}
