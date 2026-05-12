<?php

namespace Spatie\Piper\Str;

use Closure;

function before(string $search): Closure
{
    return function (string $subject) use ($search): string {
        if ($search === '') {
            return $subject;
        }

        $result = strstr($subject, $search, true);

        return $result === false ? $subject : $result;
    };
}
