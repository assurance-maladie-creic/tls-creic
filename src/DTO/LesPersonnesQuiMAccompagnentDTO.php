<?php

namespace App\DTO;

use ...;

#[Assert\Cascade]
class LesPersonnesQuiMAccompagnentDTO
{
    #[Assert\NotNull(message: 'MSG_ERR_FO_002')]
    public ?bool $accompagneParFamille = null;

    /**
     * @var list<MembreFamilleDTO>
     */
    public array $membresFamille = [];
}
