<?php

namespace Spatie\Piper\Str;

use Closure;

function ltrim(?string $characters = null): Closure
{
    return function (string $value) use ($characters): string {
        if ($characters !== null) {
            return \ltrim($value, $characters);
        }

        $defaultCharacters = " \n\r\t\v\0";

        return preg_replace('~^[\s\x{FEFF}\x{200B}\x{200E}'.$defaultCharacters.']+~u', '', $value)
            ?? \ltrim($value);
    };
}
