<?php

namespace Spatie\Piper\Str;

use Closure;

function words(int $words = 100, string $end = '...'): Closure
{
    return function (string $value) use ($words, $end): string {
        preg_match('/^\s*+(?:\S++\s*+){1,'.$words.'}/u', $value, $matches);

        if (! isset($matches[0]) || strlen($value) === strlen($matches[0])) {
            return $value;
        }

        return \rtrim($matches[0]).$end;
    };
}
