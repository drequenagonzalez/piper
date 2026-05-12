<?php

namespace Spatie\Piper\Str;

use Closure;

function substrCount(string $needle, int $offset = 0, ?int $length = null): Closure
{
    return fn (string $haystack): int => $length === null
        ? \substr_count($haystack, $needle, $offset)
        : \substr_count($haystack, $needle, $offset, $length);
}
