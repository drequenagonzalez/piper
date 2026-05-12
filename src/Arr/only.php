<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function only(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        return array_intersect_key($items, array_flip(normalize($keys)));
    };
}
