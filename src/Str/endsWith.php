<?php

namespace Spatie\Piper\Str;

use Closure;
use Traversable;

function endsWith(string|iterable $needles): Closure
{
    return function (string $haystack) use ($needles): bool {
        if ($needles instanceof Traversable) {
            $needles = iterator_to_array($needles, preserve_keys: false);
        }

        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && str_ends_with($haystack, (string) $needle)) {
                return true;
            }
        }

        return false;
    };
}
