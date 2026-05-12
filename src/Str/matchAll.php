<?php

namespace Spatie\Piper\Str;

use Closure;

function matchAll(string $pattern): Closure
{
    return function (string $subject) use ($pattern): array {
        preg_match_all($pattern, $subject, $matches);

        return $matches[0] ?? [];
    };
}
