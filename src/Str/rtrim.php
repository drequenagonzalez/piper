<?php

namespace Spatie\Piper\Str;

use Closure;

function rtrim(?string $characters = null): Closure
{
    return function (string $value) use ($characters): string {
        if ($characters !== null) {
            return \rtrim($value, $characters);
        }

        $defaultCharacters = " \n\r\t\v\0";

        return preg_replace('~[\s\x{FEFF}\x{200B}\x{200E}'.$defaultCharacters.']+$~u', '', $value)
            ?? \rtrim($value);
    };
}
