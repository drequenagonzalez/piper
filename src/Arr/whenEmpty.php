<?php

namespace Spatie\Piper\Arr;

use Closure;

function whenEmpty(callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        return $items |> when($items === [], $callback, $default);
    };
}
