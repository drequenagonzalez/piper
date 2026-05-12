<?php

namespace Spatie\Piper\Arr;

use Closure;

function unlessEmpty(callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        return $items |> whenNotEmpty($callback, $default);
    };
}
