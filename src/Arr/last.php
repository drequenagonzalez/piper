<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function last(?callable $callback = null, mixed $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        if ($callback === null) {
            return $items === [] ? evaluate($default) : end($items);
        }

        return array_reverse($items, true) |> first($callback, $default);
    };
}
