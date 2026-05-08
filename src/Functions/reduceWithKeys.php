<?php

namespace Spatie\Piper;

use Closure;

function reduceWithKeys(callable $callback, mixed $initial = null): Closure
{
    return function (array $items) use ($callback, $initial): mixed {
        return $items |> reduce($callback, $initial);
    };
}
