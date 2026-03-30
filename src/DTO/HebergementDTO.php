<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class HebergementDTO
{
    #[Assert\NotNull(message: 'MSG_ERR_FO_002')]
    public ?bool $rejointPersonneInstalleeEnFrance = null;

    public HebergeantDTO $hebergeant;

    public function __construct()
    {
        $this->hebergeant = new HebergeantDTO();
    }
}
