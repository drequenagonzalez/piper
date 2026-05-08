<?php

namespace Spatie\Piper;

use Closure;

function get(mixed $key, mixed $default = null): Closure
{
    return function (array $items) use ($key, $default): mixed {
        return array_key_exists($key ?? '', $items) ? $items[$key ?? ''] : Support::evaluate($default);
    };
}
