<?php

namespace Spatie\Piper\Str;

use Closure;

function beforeLast(string $search): Closure
{
    return function (string $subject) use ($search): string {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, $search);

        return $position === false ? $subject : \substr($subject, 0, $position);
    };
}
