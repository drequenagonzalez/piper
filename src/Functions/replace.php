<?php

namespace Spatie\Piper;

use Closure;

function replace(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_replace($items, Support::normalize($other));
    };
}
