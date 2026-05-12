<?php

namespace Spatie\Piper\Str;

use Closure;

function replaceMatches(string $pattern, string|callable $replace, int $limit = -1): Closure
{
    return fn (string $subject): string => is_callable($replace)
        ? preg_replace_callback($pattern, $replace, $subject, $limit)
        : preg_replace($pattern, $replace, $subject, $limit);
}
