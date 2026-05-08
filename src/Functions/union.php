<?php

namespace Spatie\Piper;

use Closure;

function union(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return $items + Support::normalize($other);
    };
}
