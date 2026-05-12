<?php

namespace Spatie\Piper\Str;

use Closure;
use Traversable;

function replace(string|iterable $search, string|iterable $replace, bool $caseSensitive = true): Closure
{
    return function (string $subject) use ($search, $replace, $caseSensitive): string {
        $search = $search instanceof Traversable
            ? iterator_to_array($search, preserve_keys: false)
            : $search;

        $replace = $replace instanceof Traversable
            ? iterator_to_array($replace, preserve_keys: false)
            : $replace;

        return $caseSensitive
            ? str_replace($search, $replace, $subject)
            : str_ireplace($search, $replace, $subject);
    };
}
