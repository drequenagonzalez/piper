<?php

namespace Spatie\Piper\Arr;

use Closure;

function pull(mixed $key, mixed $default = null): Closure
{
    return function (array $items) use ($key, $default): mixed {
        return $items |> get($key, $default);
    };
}
