<?php

namespace Spatie\Piper\Str;

use Closure;

function charAt(int $index): Closure
{
    return function (string $subject) use ($index): string|false {
        if ($index < 0 || $index >= mb_strlen($subject, 'UTF-8')) {
            return false;
        }

        return mb_substr($subject, $index, 1, 'UTF-8');
    };
}
