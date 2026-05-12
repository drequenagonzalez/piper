<?php

namespace Spatie\Piper\Str;

use Closure;

function is(string|iterable $patterns, bool $ignoreCase = false): Closure
{
    return function (string $value) use ($patterns, $ignoreCase): bool {
        foreach ((array) $patterns as $pattern) {
            if ($pattern === '*' || $pattern === $value) {
                return true;
            }

            if ($ignoreCase && mb_strtolower($pattern) === mb_strtolower($value)) {
                return true;
            }

            $pattern = str_replace('\*', '.*', preg_quote($pattern, '#'));

            if (preg_match('#^'.$pattern.'\z#'.($ignoreCase ? 'isu' : 'su'), $value) === 1) {
                return true;
            }
        }

        return false;
    };
}
