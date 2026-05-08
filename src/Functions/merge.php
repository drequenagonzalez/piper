<?php

namespace Spatie\Piper;

use Closure;

function merge(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_merge($items, Support::normalize($other));
    };
}
