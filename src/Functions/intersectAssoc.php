<?php

namespace Spatie\Piper;

use Closure;

function intersectAssoc(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_intersect_assoc($items, Support::normalize($other));
    };
}
