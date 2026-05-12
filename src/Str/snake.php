<?php

namespace Spatie\Piper\Str;

use Closure;

function snake(string $delimiter = '_'): Closure
{
    return function (string $value) use ($delimiter): string {
        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));
            $value = mb_strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value), 'UTF-8');
        }

        return $value;
    };
}
