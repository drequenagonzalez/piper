<?php

namespace Spatie\Piper\Str;

use Closure;

function replaceLast(string $search, string $replace): Closure
{
    return function (string $subject) use ($search, $replace): string {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, $search);

        return $position === false ? $subject : substr_replace($subject, $replace, $position, strlen($search));
    };
}
