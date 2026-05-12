<?php

namespace Spatie\Piper\Str;

use Closure;

function replaceStart(string $search, string $replace): Closure
{
    return fn (string $subject): string => $search !== '' && str_starts_with($subject, $search)
        ? $replace.\substr($subject, strlen($search))
        : $subject;
}
