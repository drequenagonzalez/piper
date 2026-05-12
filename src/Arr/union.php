<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function union(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return $items + normalize($other);
    };
}
