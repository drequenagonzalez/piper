<?php

namespace Spatie\Piper\Str;

use Closure;

function split(string $pattern, int $limit = -1, int $flags = 0): Closure
{
    return fn (string $string): array => preg_split($pattern, $string, $limit, $flags);
}
