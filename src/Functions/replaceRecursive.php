<?php

namespace Spatie\Piper;

use Closure;

function replaceRecursive(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_replace_recursive($items, Support::normalize($other));
    };
}
