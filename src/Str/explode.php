<?php

namespace Spatie\Piper\Str;

use Closure;

function explode(string $separator, int $limit = PHP_INT_MAX): Closure
{
    return fn (string $string): array => \explode($separator, $string, $limit);
}
