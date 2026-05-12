<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function unless(mixed $value, callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($value, $callback, $default): mixed {
        return $items |> when(! evaluate($value, $items), $callback, $default);
    };
}
