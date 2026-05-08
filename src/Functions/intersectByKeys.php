<?php

namespace Spatie\Piper;

use Closure;

function intersectByKeys(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_intersect_key($items, Support::normalize($other));
    };
}
