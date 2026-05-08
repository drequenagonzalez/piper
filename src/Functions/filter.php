<?php

namespace Spatie\Piper;

use Closure;

function filter(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): array {
        return $callback === null ? array_filter($items) : array_filter($items, $callback, ARRAY_FILTER_USE_BOTH);
    };
}
