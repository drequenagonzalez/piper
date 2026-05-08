<?php

namespace Spatie\Piper;

use Closure;

function intersectAssocUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_intersect_uassoc($items, Support::normalize($other), $callback);
    };
}
