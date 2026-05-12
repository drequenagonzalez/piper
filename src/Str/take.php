<?php

namespace Spatie\Piper\Str;

use Closure;

function take(int $limit): Closure
{
    return function (string $string) use ($limit): string {
        if ($limit < 0) {
            return mb_substr($string, $limit, null, 'UTF-8');
        }

        return mb_substr($string, 0, $limit, 'UTF-8');
    };
}
