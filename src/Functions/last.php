<?php

namespace Spatie\Piper;

use Closure;

function last(?callable $callback = null, mixed $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        if ($callback === null) {
            return $items === [] ? Support::evaluate($default) : end($items);
        }

        return array_reverse($items, true) |> first($callback, $default);
    };
}
