<?php

namespace Spatie\Piper\Str;

use Closure;

function afterLast(string $search): Closure
{
    return function (string $subject) use ($search): string {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, $search);

        return $position === false ? $subject : \substr($subject, $position + strlen($search));
    };
}
