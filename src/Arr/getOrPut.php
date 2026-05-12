<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function getOrPut(mixed $key, mixed $value): Closure
{
    return function (array $items) use ($key, $value): mixed {
        return array_key_exists($key ?? '', $items) ? $items[$key ?? ''] : evaluate($value);
    };
}
