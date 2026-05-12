<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function intersectAssocUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_intersect_uassoc($items, normalize($other), $callback);
    };
}
