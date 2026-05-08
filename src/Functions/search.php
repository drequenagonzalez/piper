<?php

namespace Spatie\Piper;

use Closure;

function search(mixed $value, bool $strict = false): Closure
{
    return function (array $items) use ($value, $strict): int|string|false {
        if (! Support::useAsCallable($value)) {
            return array_search($value, $items, $strict);
        }

        foreach ($items as $key => $item) {
            if ($value($item, $key)) {
                return $key;
            }
        }

        return false;
    };
}
