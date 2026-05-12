<?php

namespace Spatie\Piper\Str;

use Closure;

function replaceEnd(string $search, string $replace): Closure
{
    return fn (string $subject): string => $search !== '' && str_ends_with($subject, $search)
        ? \substr($subject, 0, -strlen($search)).$replace
        : $subject;
}
