<?php

namespace Spatie\Piper\Str;

use Closure;
use Traversable;

function contains(string|iterable $needles, bool $ignoreCase = false): Closure
{
    return function (string $haystack) use ($needles, $ignoreCase): bool {
        if ($ignoreCase) {
            $haystack = mb_strtolower($haystack);
        }

        if ($needles instanceof Traversable) {
            $needles = iterator_to_array($needles, preserve_keys: false);
        }

        foreach ((array) $needles as $needle) {
            if ($ignoreCase) {
                $needle = mb_strtolower($needle);
            }

            if ($needle !== '' && str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    };
}
