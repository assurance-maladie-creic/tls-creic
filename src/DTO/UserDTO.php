<?php

namespace App\DTO;

use App\Validator as CustomAssert;
use ...;

class UserDTO
{
    #[Assert\NotBlank]
    #[Assert\Email]
    #[Assert\Length(max: 254)]
    #[CustomAssert\UniqueEmail]
    public ?string $email = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 12, max: 50)]
    #[Assert\Regex('/[a-z]/')]
    #[Assert\Regex('/[A-Z]/')]
    #[Assert\Regex('/\d/')]
    #[Assert\Regex('/[&~"#\'{(\\[\\-|`_@\\]=+}$%*,?;.:!£°]/')]
    public ?string $plainPassword = null;
}
