<?php

namespace Spatie\Piper;

use Closure;

function unless(mixed $value, callable $callback, ?callable $default = null): Closure
{
    return function (array $items) use ($value, $callback, $default): mixed {
        return $items |> when(! Support::evaluate($value, $items), $callback, $default);
    };
}
