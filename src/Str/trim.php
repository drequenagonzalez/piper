<?php

namespace Spatie\Piper\Str;

use Closure;

function trim(?string $characters = null): Closure
{
    return function (string $value) use ($characters): string {
        if ($characters !== null) {
            return \trim($value, $characters);
        }

        $defaultCharacters = " \n\r\t\v\0";

        return preg_replace('~^[\s\x{FEFF}\x{200B}\x{200E}'.$defaultCharacters.']+|[\s\x{FEFF}\x{200B}\x{200E}'.$defaultCharacters.']+$~u', '', $value)
            ?? \trim($value);
    };
}
