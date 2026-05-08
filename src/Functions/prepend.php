<?php

namespace Spatie\Piper;

use Closure;

function prepend(mixed $value, mixed $key = null, bool $hasKey = false): Closure
{
    return function (array $items) use ($value, $key, $hasKey): array {
        if ($hasKey) {
            return [$key => $value] + $items;
        }

        array_unshift($items, $value);

        return $items;
    };
}
