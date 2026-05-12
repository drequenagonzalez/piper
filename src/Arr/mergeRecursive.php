<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function mergeRecursive(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_merge_recursive($items, normalize($other));
    };
}
