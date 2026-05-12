<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function when(mixed $value, callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($value, $callback, $default): mixed {
        $resolved = evaluate($value, $items);

        if ($resolved) {
            return $callback($items, $resolved) ?? $items;
        }

        if ($default !== null) {
            return $default($items, $resolved) ?? $items;
        }

        return $items;
    };
}
