<?php

namespace App\Enum;

use ...;

/**
 * @psalm-immutable
 */
final class TypeRedirectionEnum
{
    public const GESTION_BENEFICIAIRES = 'gestion_beneficiaires';
    public const RELATIONS_INTERNATIONALES = 'relations_internationales';

    public static function getConstants(): array
    {
        $reflectionClass = new ReflectionClass(__CLASS__);

        return $reflectionClass->getConstants();
    }
}
