<?php

namespace Spatie\Piper\Arr;

use Closure;

function percentage(callable $callback, int $precision = 2): Closure
{
    return function (array $items) use ($callback, $precision): ?float {
        if ($items === []) {
            return null;
        }

        return round(\count(($items |> filter($callback))) / \count($items) * 100, $precision);
    };
}
