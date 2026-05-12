<?php

namespace Spatie\Piper\Str;

use Closure;

function unwrap(string $before, ?string $after = null): Closure
{
    return function (string $value) use ($before, $after): string {
        $after ??= $before;

        if (str_starts_with($value, $before)) {
            $value = \substr($value, strlen($before));
        }

        if (str_ends_with($value, $after)) {
            $value = \substr($value, 0, -strlen($after));
        }

        return $value;
    };
}
