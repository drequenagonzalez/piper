<?php

namespace Spatie\Piper;

use Closure;

function mergeRecursive(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_merge_recursive($items, Support::normalize($other));
    };
}
