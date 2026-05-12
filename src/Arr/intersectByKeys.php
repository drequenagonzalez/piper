<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function intersectByKeys(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_intersect_key($items, normalize($other));
    };
}
