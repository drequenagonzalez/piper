<?php

namespace Spatie\Piper;

use Closure;

function intersectUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_uintersect($items, Support::normalize($other), $callback);
    };
}
