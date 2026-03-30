<?php

namespace App\DTO;

class TomSelectDTO
{
    public function __construct(
        public int $value,
        public string $text,
    ) {
    }
}
