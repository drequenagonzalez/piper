<?php

namespace Spatie\Piper;

use Closure;

function intersect(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_intersect($items, Support::normalize($other));
    };
}
