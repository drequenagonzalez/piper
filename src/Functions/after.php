<?php

namespace Spatie\Piper;

use Closure;

function after(mixed $value, bool $strict = false): Closure
{
    return function (array $items) use ($value, $strict): mixed {
        $key = ($items |> search($value, $strict));

        if ($key === false) {
            return null;
        }

        $keys = array_keys($items);
        $position = array_search($key, $keys, true);

        if ($position === false || $position === \count($keys) - 1) {
            return null;
        }

        return $items[$keys[$position + 1]];
    };
}
