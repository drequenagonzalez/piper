<?php

namespace Spatie\Piper\Arr;

use Closure;

function before(mixed $value, bool $strict = false): Closure
{
    return function (array $items) use ($value, $strict): mixed {
        $key = ($items |> search($value, $strict));

        if ($key === false) {
            return null;
        }

        $keys = array_keys($items);
        $position = array_search($key, $keys, true);

        if ($position === false || $position === 0) {
            return null;
        }

        return $items[$keys[$position - 1]];
    };
}
