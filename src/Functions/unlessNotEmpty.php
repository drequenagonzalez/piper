<?php

namespace Spatie\Piper;

use Closure;

function unlessNotEmpty(callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        return $items |> whenEmpty($callback, $default);
    };
}
