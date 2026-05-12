<?php

namespace Spatie\Piper\Arr;

use Closure;

function has(mixed ...$keys): Closure
{
    return function (array $items) use ($keys): bool {
        $keys = \count($keys) === 1 && is_array($keys[0]) ? $keys[0] : $keys;

        foreach ($keys as $key) {
            if (! array_key_exists($key ?? '', $items)) {
                return false;
            }
        }

        return true;
    };
}
