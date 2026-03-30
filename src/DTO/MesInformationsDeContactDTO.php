<?php

namespace App\DTO;

use ...;

class MesInformationsDeContactDTO
{
    #[Assert\Length(min: 10, max: 10)]
    public ?string $numeroTelephoneMobile = null;

    #[Assert\Length(min: 10, max: 10)]
    public ?string $numeroTelephoneFixe = null;
}
