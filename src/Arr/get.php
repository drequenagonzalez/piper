<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function get(mixed $key, mixed $default = null): Closure
{
    return function (array $items) use ($key, $default): mixed {
        return array_key_exists($key ?? '', $items) ? $items[$key ?? ''] : evaluate($default);
    };
}
