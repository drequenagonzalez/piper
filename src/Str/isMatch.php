<?php

namespace Spatie\Piper\Str;

use Closure;

function isMatch(string|array $pattern): Closure
{
    return function (string $value) use ($pattern): bool {
        foreach ((array) $pattern as $singlePattern) {
            if (preg_match($singlePattern, $value) === 1) {
                return true;
            }
        }

        return false;
    };
}
