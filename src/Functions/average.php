<?php

namespace Spatie\Piper;

use Closure;

function average(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): int|float|null {
        return $items |> avg($callback);
    };
}
