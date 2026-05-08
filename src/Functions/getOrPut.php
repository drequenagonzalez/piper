<?php

namespace Spatie\Piper;

use Closure;

function getOrPut(mixed $key, mixed $value): Closure
{
    return function (array $items) use ($key, $value): mixed {
        return array_key_exists($key ?? '', $items) ? $items[$key ?? ''] : Support::evaluate($value);
    };
}
