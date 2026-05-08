<?php

namespace Spatie\Piper;

use Closure;

function diff(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff($items, Support::normalize($other));
    };
}
