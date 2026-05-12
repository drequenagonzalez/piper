<?php

namespace Spatie\Piper\Str;

use Closure;
use Traversable;

function startsWith(string|iterable $needles): Closure
{
    return function (string $haystack) use ($needles): bool {
        if ($needles instanceof Traversable) {
            $needles = iterator_to_array($needles, preserve_keys: false);
        }

        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && str_starts_with($haystack, (string) $needle)) {
                return true;
            }
        }

        return false;
    };
}
