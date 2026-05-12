<?php

namespace Spatie\Piper\Str;

use Closure;

function studly(): Closure
{
    return function (string $value): string {
        $words = \explode(' ', str_replace(['-', '_'], ' ', $value));

        return implode('', array_map(fn (string $word): string => $word |> ucfirst(), $words));
    };
}
