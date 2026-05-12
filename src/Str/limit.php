<?php

namespace Spatie\Piper\Str;

use Closure;

function limit(int $limit = 100, string $end = '...', bool $preserveWords = false): Closure
{
    return function (string $value) use ($limit, $end, $preserveWords): string {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        $value = \rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8'));

        if ($preserveWords) {
            $value = preg_replace('/\s+\S*$/u', '', $value) ?: $value;
        }

        return $value.$end;
    };
}
