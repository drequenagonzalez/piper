<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function replaceRecursive(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_replace_recursive($items, normalize($other));
    };
}
